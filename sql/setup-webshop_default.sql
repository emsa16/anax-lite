--
-- Default database SQL, NOTE that all account details should be replaced
-- by actual information
--

-- CREATE DATABASE IF NOT EXISTS emsa16;
-- GRANT ALL ON emsa16.* TO user IDENTIFIED BY 'password';
-- USE emsa16;

SET NAMES utf8;



-- ------------------------------------------------------------------------
--
-- Setup tables
--
DROP TABLE IF EXISTS `OrderRow`;
DROP TABLE IF EXISTS `Order`;
DROP TABLE IF EXISTS `BasketRow`;
DROP TABLE IF EXISTS `Basket`;
DROP TABLE IF EXISTS `Customer`;
DROP TABLE IF EXISTS `Restock`;
DROP TABLE IF EXISTS `Inventory`;
DROP TABLE IF EXISTS `Prod2Cat`;
DROP TABLE IF EXISTS `ProdCategory`;
DROP TABLE IF EXISTS `Product`;



-- ------------------------------------------------------------------------
--
-- Product and product category
--
CREATE TABLE `Product` (
	`id` INT AUTO_INCREMENT,
    `description` VARCHAR(20),
    `image` VARCHAR(50),
    `price` DECIMAL(6,2),

	PRIMARY KEY (`id`)
);

CREATE TABLE `ProdCategory` (
	`id` INT AUTO_INCREMENT,
	`category` CHAR(10) UNIQUE,

	PRIMARY KEY (`id`)
);

CREATE TABLE `Prod2Cat` (
	`id` INT AUTO_INCREMENT,
	`prod_id` INT,
	`cat_id` INT,

	PRIMARY KEY (`id`),
    FOREIGN KEY (`prod_id`) REFERENCES `Product` (`id`) ON DELETE CASCADE,
    FOREIGN KEY (`cat_id`) REFERENCES `ProdCategory` (`id`) ON DELETE CASCADE
);



-- ------------------------------------------------------------------------
--
-- Inventory
--
CREATE TABLE `Inventory` (
	`id` INT AUTO_INCREMENT,
    `prod_id` INT UNIQUE,
    `items` INT,

	PRIMARY KEY (`id`),
	FOREIGN KEY (`prod_id`) REFERENCES `Product` (`id`) ON DELETE CASCADE
);

CREATE TABLE `Restock` (
    `id` INT AUTO_INCREMENT,
    `prod_id` INT UNIQUE,
    `added` DATETIME DEFAULT CURRENT_TIMESTAMP,

    PRIMARY KEY (`id`),
    FOREIGN KEY (`prod_id`) REFERENCES `Product` (`id`) ON DELETE CASCADE
);

-- ------------------------------------------------------------------------
--
-- Customer
--
CREATE TABLE `Customer` (
	`id` INT AUTO_INCREMENT,
    `username` VARCHAR(20) DEFAULT NULL,

	PRIMARY KEY (`id`),
    FOREIGN KEY (`username`) REFERENCES `me_users` (`name`) ON DELETE SET NULL
);



-- ------------------------------------------------------------------------
--
-- Shopping basket
--
CREATE TABLE `Basket` (
	`id` INT AUTO_INCREMENT,
    `customer` INT UNIQUE,

	PRIMARY KEY (`id`),
	FOREIGN KEY (`customer`) REFERENCES `Customer` (`id`)
);

CREATE TABLE `BasketRow` (
	`id` INT AUTO_INCREMENT,
    `basket` INT,
    `product` INT,
	`items` INT,

	PRIMARY KEY (`id`),
	FOREIGN KEY (`basket`) REFERENCES `Basket` (`id`) ON DELETE CASCADE,
	FOREIGN KEY (`product`) REFERENCES `Product` (`id`) ON DELETE CASCADE
);



-- ------------------------------------------------------------------------
--
-- Order
--
CREATE TABLE `Order` (
	`id` INT AUTO_INCREMENT,
    `customer` INT,
	`created` DATETIME DEFAULT CURRENT_TIMESTAMP,
	`updated` DATETIME DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
	`deleted` DATETIME DEFAULT NULL,
	`delivery` DATETIME DEFAULT NULL,

	PRIMARY KEY (`id`),
	FOREIGN KEY (`customer`) REFERENCES `Customer` (`id`)
);

CREATE TABLE `OrderRow` (
	`id` INT AUTO_INCREMENT,
    `order` INT,
    `product` INT,
	`items` INT,

	PRIMARY KEY (`id`),
	FOREIGN KEY (`order`) REFERENCES `Order` (`id`) ON DELETE CASCADE,
	FOREIGN KEY (`product`) REFERENCES `Product` (`id`) ON DELETE SET NULL
);



-- ------------------------------------------------------------------------
--
-- STORED FUNCTIONS
--
DROP FUNCTION IF EXISTS notInInventory;
DELIMITER //
CREATE FUNCTION notInInventory(
    product INTEGER,
	amount INTEGER
)
RETURNS BOOL
COMMENT 'Checks if requested product amount is in inventory. Returns false if yes.'
BEGIN
    DECLARE currentStock INT;
    SET currentStock = (SELECT items FROM Inventory WHERE prod_id = product);
    IF amount > currentStock THEN
        RETURN 1;
    END IF;
	RETURN 0;
END
//
DELIMITER ;

DROP FUNCTION IF EXISTS delivered;
DELIMITER //
CREATE FUNCTION delivered(
    `order` INTEGER
)
RETURNS BOOL
COMMENT 'Checks if order has been delivered'
BEGIN
    DECLARE delivered DATETIME;
    SELECT delivery INTO delivered FROM `Order` WHERE id = `order`;
    RETURN delivered <= NOW();
END
//
DELIMITER ;

DROP FUNCTION IF EXISTS getPrice;
CREATE FUNCTION getPrice(
    items INTEGER,
    price DECIMAL(6,2)
)
RETURNS DECIMAL(10,2)
RETURN items * price;



-- ------------------------------------------------------------------------
--
-- VIEWS
--
DROP VIEW IF EXISTS VProducts;
CREATE VIEW VProducts AS
SELECT
	P.id AS ProductNumber,
    P.description AS Description,
    P.image AS ImageLink,
    P.price AS Price,
    GROUP_CONCAT(category) AS Category,
    Inv.items AS Inventory
FROM Product AS P
	INNER JOIN Prod2Cat AS P2C
		ON P.id = P2C.prod_id
	INNER JOIN ProdCategory AS PC
		ON PC.id = P2C.cat_id
	INNER JOIN Inventory AS Inv
		ON P.id = Inv.prod_id
GROUP BY P.id
ORDER BY P.description
;

DROP VIEW IF EXISTS VBaskets;
CREATE VIEW VBaskets AS
SELECT
    B.id AS BasketNumber,
    C.username AS CustomerName,
    R.id AS BasketRow,
    P.description AS Description,
    R.items AS Items,
    getPrice(R.items, P.price) AS TotalPrice
FROM `Basket` AS B
	INNER JOIN BasketRow AS R
		ON B.id = R.basket
	INNER JOIN Product AS P
		ON R.product = P.id
    INNER JOIN Customer AS C
		ON B.customer = C.id
ORDER BY BasketRow
;

DROP VIEW IF EXISTS VOrders;
CREATE VIEW VOrders AS
SELECT
    O.id AS OrderNumber,
    C.username AS CustomerName,
    R.id AS OrderRow,
    P.description AS Description,
    R.items AS Items,
    getPrice(R.items, P.price) AS TotalPrice,
    O.created AS OrderDate
FROM `Order` AS O
	INNER JOIN OrderRow AS R
		ON O.id = R.order
	INNER JOIN Product AS P
		ON R.product = P.id
    INNER JOIN Customer AS C
		ON O.customer = C.id
WHERE
    O.deleted IS NULL
ORDER BY OrderRow
;



-- ------------------------------------------------------------------------
--
-- STORED PROCEDURES
--
DROP PROCEDURE IF EXISTS addProduct;
DELIMITER //
CREATE PROCEDURE addProduct(
    description VARCHAR(20),
    image VARCHAR(50),
    price DECIMAL(6,2),
    cat_id INT,
    items INT
)
COMMENT 'NOTE: Not a good solution, need to get ahold of the product id to be simpler and safer to insert category and inventory'
BEGIN
    START TRANSACTION;

    INSERT INTO `Product` (`description`, `image`, `price`) VALUES
        (description, image, price);

    INSERT INTO `Prod2Cat` (`prod_id`, `cat_id`)
    SELECT
        P.id,
        cat_id
    FROM Product AS P
    WHERE
        P.description = description AND
        P.image = image AND
        P.price = price
    ;

    INSERT INTO `Inventory` (`prod_id`, `items`)
	SELECT
        P.id,
        items
    FROM Product AS P
    WHERE
        P.description = description AND
        P.image = image AND
        P.price = price
    ;

    COMMIT;
END
//
DELIMITER ;

DROP PROCEDURE IF EXISTS updateProduct;
DELIMITER //
CREATE PROCEDURE updateProduct(
	pid INT,
    title VARCHAR(20),
    image VARCHAR(50),
    price DECIMAL(6,2),
    category INT,
    inventory INT
)
BEGIN
    START TRANSACTION;

    UPDATE Product
    SET
        description = title,
        image = image,
        price = price
    WHERE
        id = pid
    ;

    UPDATE Prod2Cat
    SET
        cat_id = category
    WHERE
        prod_id = pid
    ;

    UPDATE Inventory
    SET
        items = inventory
    WHERE
        prod_id = pid
    ;

    COMMIT;
END
//
DELIMITER ;



DROP PROCEDURE IF EXISTS addToBasket;
DELIMITER //
CREATE PROCEDURE addToBasket(
	basket INT,
    product INT,
    amount INT
)
BEGIN
    START TRANSACTION;
    IF notInInventory(product, amount) THEN
        ROLLBACK;
        SELECT "There is not enough product in inventory";
    ELSE
        INSERT INTO `BasketRow` (`basket`, `product`, `items`) VALUES
        (basket, product, amount);
        COMMIT;
    END IF;
END
//
DELIMITER ;


DROP PROCEDURE IF EXISTS updateBasketRow;
DELIMITER //
CREATE PROCEDURE updateBasketRow(
	row INT,
    amount INT
)
BEGIN
    DECLARE product INT;

    START TRANSACTION;
    SET product = (SELECT product FROM BasketRow WHERE id = row);
    IF notInInventory(product, amount) THEN
        ROLLBACK;
        SELECT "There is not enough product in inventory";
    ELSEIF amount = 0 THEN
        CALL removeBasketRow(row);
        COMMIT;
    ELSE
        UPDATE `BasketRow`
        SET
            items = amount
        WHERE
            id = row
        ;
        COMMIT;
    END IF;
END
//
DELIMITER ;


DROP PROCEDURE IF EXISTS removeBasketRow;
CREATE PROCEDURE removeBasketRow(
	basketRow INT
)
DELETE FROM `BasketRow`
WHERE
    id = basketRow
;


DROP PROCEDURE IF EXISTS showBasket;
CREATE PROCEDURE showBasket(
	basket INT
)
SELECT * FROM VBaskets
WHERE
    BasketNumber = basket
;


DROP PROCEDURE IF EXISTS checkOut;
DELIMITER //
CREATE PROCEDURE checkOut(
    basketid INT
)
COMMENT 'Creates new order, fills order with basket items, deletes basket'
BEGIN
    START TRANSACTION;

    INSERT INTO `Order` (`customer`)
    SELECT
        B.customer
    FROM Basket AS B
    WHERE
        B.id = basketid
    ;

    INSERT INTO `OrderRow` (`order`, `product`, `items`)
    SELECT
        O.id,
        R.product,
        R.items
    FROM `Order` AS O
        INNER JOIN Basket AS B
            ON O.customer = B.customer
        INNER JOIN BasketRow AS R
            ON R.basket = B.id
    WHERE
        R.basket = basketid
    ;

    DELETE FROM `Basket`
    WHERE
        id = basketid
    ;

    COMMIT;
END
//
DELIMITER ;


DROP PROCEDURE IF EXISTS showOrder;
CREATE PROCEDURE showOrder(
	`order` INT
)
SELECT * FROM VOrders
WHERE
    OrderNumber = `order`
;


DROP PROCEDURE IF EXISTS removeOrder;
DELIMITER //
CREATE PROCEDURE removeOrder(
	`order` INT
)
BEGIN
    START TRANSACTION;
    IF delivered(`order`) THEN
        ROLLBACK;
        SELECT "This order has already been delivered";
    ELSE
        UPDATE `Order`
        SET
            `deleted` = CURRENT_TIMESTAMP
        WHERE
            id = `order`
        ;
        COMMIT;
    END IF;
END
//
DELIMITER ;


DROP PROCEDURE IF EXISTS showRestock;
CREATE PROCEDURE showRestock()
SELECT
    R.prod_id AS ProductNumber,
    P.description AS Description,
    R.added AS Added
FROM `Restock` AS R
    INNER JOIN Product AS P
        ON P.id = R.prod_id
;



-- ------------------------------------------------------------------------
--
-- TRIGGERS
--
-- When order is made, move products from inventory
DROP TRIGGER IF EXISTS moveInvToOrder;
CREATE TRIGGER moveInvToOrder
AFTER INSERT
ON OrderRow FOR EACH ROW
UPDATE `Inventory`
SET
    items = (items - NEW.items)
WHERE
    prod_id = NEW.product
;

-- If order is deleted, products are moved back to inventory
DROP TRIGGER IF EXISTS moveOrderToInv;
DELIMITER //
CREATE TRIGGER moveOrderToInv
AFTER UPDATE
ON `Order` FOR EACH ROW
BEGIN
    DROP TEMPORARY TABLE IF EXISTS `DeletedRows`;
    CREATE TEMPORARY TABLE `DeletedRows` AS
    SELECT * FROM OrderRow
    WHERE
        `order` = NEW.id AND
        OLD.deleted IS NULL AND
        NEW.deleted IS NOT NULL
    ;
    UPDATE `Inventory` AS I
    INNER JOIN `DeletedRows` AS D
        ON I.prod_id = D.product
    SET
        I.items = (I.items + D.items)
    ;
	DROP TEMPORARY TABLE `DeletedRows`;
END
//
DELIMITER ;

-- If product inventory is below 5, add row to restock table
DROP TRIGGER IF EXISTS addRestock;
DELIMITER //
CREATE TRIGGER addRestock
AFTER UPDATE
ON Inventory FOR EACH ROW
BEGIN
    IF NEW.items < 5 THEN
        INSERT INTO `Restock` (`prod_id`) VALUES
			(NEW.prod_id)
        ON DUPLICATE KEY UPDATE id=id;
    END IF;
END
//
DELIMITER ;



-- ------------------------------------------------------------------------
--
-- Fill in product catalogue and inventory
--
INSERT INTO `ProdCategory` (`category`) VALUES
    ("cameras"), ("perfumes"), ("food")
;

INSERT INTO `Product` (`description`, `image`, `price`) VALUES
    ("Vintage camera", "vintage-camera.jpeg", 2499.50),
    ("Fujifilm camera", "fujifilm-camera.jpeg", 4999),
    ("Miss Dior perfume", "missdior-perfume.jpeg", 399),
    ("Coach perfume", "coach-perfume.jpeg", 699.50),
    ("Fresh bread", "bread.jpeg", 19.90)
;

INSERT INTO `Prod2Cat` (`prod_id`, `cat_id`) VALUES
    (1, 1),
    (2, 1),
    (3, 2),
    (4, 2),
    (5, 3)
;

INSERT INTO `Inventory` (`prod_id`, `items`) VALUES
(1, 100), (2, 100),
(3, 100), (4, 100),
(5, 50)
;



-- ------------------------------------------------------------------------
--
-- TEST PURPOSES ONLY BELOW!!!
--
DROP PROCEDURE IF EXISTS testAPI;
DELIMITER //
CREATE PROCEDURE testAPI()
COMMENT 'Showcases the database API'
BEGIN
    START TRANSACTION;

    -- NOTE: Missing API for adding new customers and new baskets
    INSERT INTO `Customer` (`username`) VALUES
    ("doe"), ("admin")
    ;

    INSERT INTO `Basket` (`customer`) VALUES
    (1), (2)
    ;

    -- CALL showBasket(1); -- empty

    CALL addToBasket(1, 1, 10);
    CALL addToBasket(1, 2, 20);
    CALL addToBasket(1, 3, 30);
    CALL addToBasket(1, 4, 40);
    CALL addToBasket(1, 5, 50);

    -- CALL showBasket(1);

    CALL updateBasketRow(1, 99);

    -- CALL showBasket(1);

    CALL removeBasketRow(5);

    CALL showBasket(1);

    -- CALL showOrder(1); -- empty

    CALL checkOut(1);

    -- CALL showBasket(1); -- empty

    CALL showOrder(1);

    CALL showRestock(); -- should show vintage-camera

    CALL addToBasket(2, 4, 56);
    CALL checkOut(2);
    CALL showOrder(2);
    CALL showRestock(); -- should show vintage-camera and coach-perfume

	-- UPDATE `Order` SET `delivery` = NOW() WHERE id = 2;  -- to test that order cannot be removed once delivered

    SELECT * FROM VProducts;

    CALL removeOrder(2);
    CALL showOrder(2); -- empty

    SELECT * FROM VProducts;

    COMMIT;
END
//
DELIMITER ;



-- CALL testAPI();

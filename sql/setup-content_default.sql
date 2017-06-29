--
-- Default database SQL, NOTE that all account details should be replaced
-- by actual information
--

-- CREATE DATABASE IF NOT EXISTS emsa16;
-- GRANT ALL ON emsa16.* TO user IDENTIFIED BY 'password';
-- USE emsa16;

-- Ensure UTF8 as chacrter encoding within connection.
SET NAMES utf8;

DROP TABLE IF EXISTS `content`;
CREATE TABLE `content`
(
  `id` INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
  `path` CHAR(120) UNIQUE,
  `slug` CHAR(120) UNIQUE,

  `title` VARCHAR(120),
  `data` TEXT,
  `type` CHAR(20) NOT NULL,
  `filter` VARCHAR(80) DEFAULT NULL,

  -- MySQL version 5.6 and higher
  -- `published` DATETIME DEFAULT CURRENT_TIMESTAMP,
  -- `created` DATETIME DEFAULT CURRENT_TIMESTAMP,
  -- `updated` DATETIME DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,

  -- MySQL version 5.5 and lower
  `published` DATETIME DEFAULT NULL,
  `created` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  `updated` DATETIME DEFAULT NULL,

  `deleted` DATETIME DEFAULT NULL

) ENGINE INNODB CHARACTER SET utf8 COLLATE utf8_swedish_ci;

INSERT INTO `content` (`path`, `slug`, `title`, `data`, `type`, `filter`, `published`, `created`, `updated`, `deleted`) VALUES
    ('hem','hem','Hem','Detta är min hemsida. Den är skriven i [url=http://en.wikipedia.org/wiki/BBCode]bbcode[/url] vilket innebär att man kan formattera texten till [b]bold[/b] och [i]kursiv stil[/i] samt hantera länkar.\r\n\r\nDessutom finns ett filter \'nl2br\' som lägger in <br>-element istället för \\n, det är smidigt, man kan skriva texten precis som man tänker sig att den skall visas, med radbrytningar.','page','bbcode,nl2br','2017-06-03 00:00:00','2017-06-03 12:48:28','2017-06-03 15:50:22',NULL),
    ('om','om','Om','Detta är en sida om mig och min webbplats. Den är skriven i [Markdown](http://en.wikipedia.org/wiki/Markdown). Markdown innebär att du får bra kontroll över innehållet i din sida, du kan formattera och sätta rubriker, men du behöver inte bry dig om HTML.\r\n\r\nRubrik nivå 2\r\n-------------\r\n\r\nDu skriver enkla styrtecken för att formattera texten som **fetstil** och *kursiv*. Det finns ett speciellt sätt att länka, skapa tabeller och så vidare.\r\n\r\n###Rubrik nivå 3\r\n\r\nNär man skriver i markdown så blir det läsbart även som textfil och det är lite av tanken med markdown.','page','markdown','2017-06-03 00:00:00','2017-06-03 12:48:28','2017-06-03 15:50:28',NULL),
    ('blogpost-1','valkommen-till-min-blogg','Välkommen till min blogg!','Detta är en bloggpost.\r\n\r\nNär det finns länkar till andra webbplatser så kommer de länkarna att bli klickbara.\r\n\r\nhttp://dbwebb.se är ett exempel på en länk som blir klickbar.','post','link,nl2br','2017-06-03 00:00:00','2017-06-03 12:48:28','2017-06-03 15:50:40',NULL),
    ('blogpost-2','nu-har-sommaren-kommit','Nu har sommaren kommit','Detta är en bloggpost som berättar att sommaren har kommit, ett budskap som kräver en bloggpost.','post','nl2br','2017-06-03 00:00:00','2017-06-03 12:48:28','2017-06-03 15:50:47',NULL),
    ('blogpost-3','nu-har-hosten-kommit','Nu har hösten kommit','Detta är en bloggpost som berättar att sommaren har kommit, ett budskap som kräver en bloggpost','post','nl2br','2017-11-03 00:00:00','2017-06-03 12:48:28','2017-06-03 15:51:00',NULL),
    ('store','store','Store','Här kan du handla en massa fina varor över nätet.','page','','2017-06-03 00:00:00','2017-06-03 13:51:30','2017-06-03 15:52:52','2017-06-03 15:52:07'),
    ('blogpost-4','hur-lar-man-sig-php','Hur lär man sig PHP?','Det är lättare än man kan tro.... fortsätt skriva här, sparar som utkast.','post','',NULL,'2017-06-03 13:53:10','2017-06-03 15:53:39',NULL),
    (NULL,'sidebar-1','Sidebar 1','Det här är innehållet i sidorutan\r\n\r\n* En lista\r\n* skriven i\r\n* Markdown','block','markdown',NULL,'2017-06-03 17:41:16','2017-06-03 20:07:54',NULL),
    (NULL,'flash-1','Flash 1','Detta är ett [b]flashinnehåll[/b]','block','bbcode',NULL,'2017-06-03 18:06:38','2017-06-03 20:07:17',NULL);

DROP VIEW IF EXISTS `VContent`;
CREATE VIEW `VContent` AS
SELECT
    *,
    CASE
        WHEN (deleted <= NOW()) THEN "isDeleted"
        WHEN (published <= NOW()) THEN "isPublished"
        ELSE "notPublished"
    END AS status
FROM content
;

DROP VIEW IF EXISTS `VPages`;
CREATE VIEW `VPages` AS
SELECT
    *,
    DATE_FORMAT(COALESCE(updated, published), '%Y-%m-%dT%TZ') AS modified_iso8601,
    DATE_FORMAT(COALESCE(updated, published), '%Y-%m-%d') AS modified
FROM content
WHERE
    type="page"
    AND (deleted IS NULL OR deleted > NOW())
    AND published <= NOW()
;

DROP VIEW IF EXISTS `VPosts`;
CREATE VIEW `VPosts` AS
SELECT
    *,
    DATE_FORMAT(COALESCE(updated, published), '%Y-%m-%dT%TZ') AS published_iso8601,
    DATE_FORMAT(COALESCE(updated, published), '%Y-%m-%d') AS published_date
FROM content
WHERE
    type="post"
    AND (deleted IS NULL OR deleted > NOW())
    AND published <= NOW()
ORDER BY published_date DESC
;

DROP VIEW IF EXISTS `VBlock`;
CREATE VIEW `VBlock` AS
SELECT
    *
FROM content
WHERE type="block"
;



--
-- ADDING INDEXES
--

-- Finding type of content
-- EXPLAIN SELECT * FROM Content WHERE type = 'post';
-- EXPLAIN SELECT * FROM Content WHERE type = 'page';
-- EXPLAIN SELECT * FROM Content WHERE type = 'block';

CREATE INDEX index_type on content(type);

-- EXPLAIN SELECT * FROM Content FORCE INDEX (index_type) WHERE type = 'post';
-- EXPLAIN SELECT * FROM Content WHERE type = 'page';
-- EXPLAIN SELECT * FROM Content WHERE type = 'block';

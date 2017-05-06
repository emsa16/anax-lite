--
-- Default database SQL, NOTE that all account details should be replaced
-- by actual information
--

-- CREATE DATABASE IF NOT EXISTS emsa16;
-- GRANT ALL ON emsa16.* TO user IDENTIFIED BY 'password';
USE emsa16;

SET NAMES utf8;

DROP TABLE IF EXISTS me_users;
CREATE TABLE me_users
(
  `name` VARCHAR(20) NOT NULL UNIQUE,
  `pass` VARCHAR(100) NOT NULL,
  `image` VARCHAR(100) DEFAULT NULL,

  PRIMARY KEY(`name`)
);

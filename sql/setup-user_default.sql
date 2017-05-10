--
-- Default database SQL, NOTE that all account details should be replaced
-- by actual information
--

-- CREATE DATABASE IF NOT EXISTS emsa16;
-- GRANT ALL ON emsa16.* TO user IDENTIFIED BY 'password';
-- USE emsa16;

SET NAMES utf8;

DROP TABLE IF EXISTS me_users;
CREATE TABLE me_users
(
  `name` VARCHAR(20) NOT NULL UNIQUE,
  `pass` VARCHAR(100) NOT NULL,
  `level` VARCHAR(10) DEFAULT 'user',

  PRIMARY KEY(`name`)
);

INSERT INTO me_users(name, pass, level) VALUES ('admin', '$2y$10$JXPCchHa7g6fsSsyDyip8enHjRBLDn0x/1sNjOH3aiMKUzEago2rK', 'admin');
INSERT INTO me_users(name, pass, level) VALUES ('doe', '$2y$10$6R7BeDpK3qyB5iVQqqVjSery8t/.CfZykF3STDgktKzsbD9ud35bi', 'user');

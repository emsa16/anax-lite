<?php
/**
 * Details for connecting to the database.
 * NOTE: This is a default file, and all login details should be replaced
 * with actual info.
 */
return [
    "dsn"      => "mysql:host=host;dbname=db;",
    "login"    => "login",
    "password" => "password",
    "options"  => [\PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'UTF8'"],
];

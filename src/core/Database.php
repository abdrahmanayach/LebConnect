<?php

namespace App\Core;

use mysqli;

class Database {
    private static $host = "localhost";
    private static $username = "root";
    private static $password = "";
    private static $database = "project"; 

    private static $db = null;

    public static function getDB() {
        if(is_null(self::$db)) {
            $db = new mysqli(self::$host, self::$username, self::$password);
            if ($db->connect_error) {
                die("Connection failed: " . $db->connect_error);
            }
            
            $createDbSql = "CREATE DATABASE IF NOT EXISTS " . self::$database;
            if ($db->query($createDbSql) === FALSE) {
                die("Error creating database: " . $db->error);
            }

            $db->select_db(self::$database);
            self::$db = $db;
        }
        return self::$db;
    }
}

?>
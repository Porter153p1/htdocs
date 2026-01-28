<?php
class Database {
    private static $instance = null;

    public static function connect() {
        if (self::$instance === null) {
            self::$instance = new PDO(
                "mysql:host=".DB_HOST.";dbname=".DB_NAME,
                DB_USER,
                DB_PASS,
                [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
            );
        }
        return self::$instance;
    }
}
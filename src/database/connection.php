<?php

namespace framework\database;
 
use framework\utils\logs\logs;
use PDO;
use PDOException;

class db {
    private static $instance = null;
    private $connection;

    private function __construct() {
        try {
            // Hardcoded connection details
            $driver = 'mysql';
            $host = 'localhost';
            $port = '3306';
            $dbname = 'base';
            $user = 'root';
            $pass = '';

            // DSN string
            $dsn = "{$driver}:host={$host};port={$port};dbname={$dbname}";

            // Initialize connection + log
            $this->connection = new PDO($dsn, $user, $pass);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // logs::info("Database connection successful: {$dsn}");

        } catch (PDOException $e) {
            // Log + kill
            logs::info('Connection failed: ' . $e->getMessage());
            die('Connection failed: ' . $e->getMessage());
        }
    }

    // Create new db instance
    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new db();
        }
        return self::$instance;
    }

    // Get the database connection
    public function getConnection() {
        return $this->connection;
    }
}
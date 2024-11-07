<?php

namespace framework\database;

require_once 'connection.php'; 

use framework\database\db;

// Attempt to get the DB instance
$dbInstance = db::getInstance();
$connection = $dbInstance->getConnection();

// Check if the connection is established
if ($connection) {
    echo "Connection successful!";
} else {
    echo "Connection failed!";
}
<!-- run this file in terminal to test db connection: php src/data/test.php -->

<?

namespace framework\data;

require_once 'db.php'; 

use framework\data\db;

// Attempt to get the DB instance
$dbInstance = db::getInstance();
$connection = $dbInstance->getConnection();

// Check if the connection is established
if ($connection) {
    echo "Connection successful!";
} else {
    echo "Connection failed!";
}

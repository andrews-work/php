<?

namespace framework\data;
 
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

            // logs::info("Database connection successful:");

        } catch (PDOException $e) {
            // Log + kill
            logs::info('Connection failed');
            die('Connection failed: ' . $e->getMessage());
        }
    }

    // instance
    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new db();
        }
        return self::$instance;
    }

    // connection
    public function getConnection() {
        return $this->connection;
    }
}
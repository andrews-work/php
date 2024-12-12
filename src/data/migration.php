<?

namespace framework\data;

use framework\data\db;

abstract class migration
{
    protected $db;

    // Constructor that accepts the db connection via dependency injection
    public function __construct(db $db)
    {
        $this->db = $db->getConnection(); // Get the DB connection from the db instance
    }

    // Abstract methods for up() and down()
    abstract public function up();
    abstract public function down();

    // Helper method to create a table
    protected function createTable($tableName, $columns)
    {
        $sql = "CREATE TABLE IF NOT EXISTS {$tableName} (";
        $columnDefs = [];
        foreach ($columns as $name => $definition) {
            $columnDefs[] = "{$name} {$definition}";
        }
        $sql .= implode(", ", $columnDefs);
        $sql .= ")";

        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        echo "Table '{$tableName}' created successfully.\n";
    }

    // Helper method to add a primary key
    protected function addPrimaryKey($tableName, $columns)
    {
        $sql = "ALTER TABLE {$tableName} ADD PRIMARY KEY (" . implode(", ", $columns) . ")";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        echo "Primary key added to '{$tableName}'.\n";
    }
}
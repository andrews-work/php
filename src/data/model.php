<?

namespace framework\data;

use framework\data\db;

class model
{
    protected $table;
    protected $fillable = [];

    // 
    protected $db;
    private static $instance = null;

    // use db class
    protected function __construct()
    {
        $this->db = db::getInstance()->getConnection();
    }

    // instance
    public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    // create
    public function create(array $attributes)
    {
        // Filter attributes by the fillable property to avoid mass-assignment issues
        $fillableAttributes = array_intersect_key($attributes, array_flip($this->fillable));

        // Prepare the SQL query
        $columns = implode(", ", array_keys($fillableAttributes));
        $placeholders = ":" . implode(", :", array_keys($fillableAttributes));
        $sql = "INSERT INTO " . $this->table . " ($columns) VALUES ($placeholders)";

        $stmt = $this->db->prepare($sql);

        // Bind the values to the statement
        foreach ($fillableAttributes as $key => $value) {
            $stmt->bindValue(":$key", $value);
        }

        // Execute the query and return true on success, false on failure
        return $stmt->execute();
    }

}

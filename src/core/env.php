<?

namespace framework\core;

use Exception;

class env {
    private static $instance = null;
    private static $data = [];

    private function __construct() {}

    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public static function load($file) {
        if (!file_exists($file)) {
            throw new Exception("The .env file does not exist.");
        }

        $lines = file($file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        foreach ($lines as $line) {
            // Ignore comments
            if (strpos(trim($line), '#') === 0) {
                continue;
            }
            // Split key and value
            list($key, $value) = explode('=', $line, 2);
            self::$data[trim($key)] = trim($value);
        }
    }

    public static function get($key, $default = null) {
        return isset(self::$data[$key]) ? self::$data[$key] : $default;
    }
}

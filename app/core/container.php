<?

namespace app\core;

class container {
    private $services = [];

    public function set($key, $value) {
        $this->services[$key] = $value;
    }

    public function get($key) {
        return $this->services[$key] ?? null;
    }
}

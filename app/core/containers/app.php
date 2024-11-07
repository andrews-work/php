<?php

namespace app\core\containers;

class app {
    private $services = [];

    public function set($key, $value) {
        $this->services[$key] = $value;
    }

    public function get($key) {
        return $this->services[$key] ?? null;
    }
}

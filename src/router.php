<?php

class router
{
    private $routes = [];

    public function get($path, $controller)
    {
        $this->routes['GET'][$path] = $controller;
    }

    public function post($path, $controller)
    {
        $this->routes['POST'][$path] = $controller;
    }

    public function dispatch()
    {
        $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $method = $_SERVER['REQUEST_METHOD'];

        if (isset($this->routes[$method][$uri])) {
            $controller = $this->routes[$method][$uri];
            call_user_func_array([new $controller[0], $controller[1]], []);
        } else {
            http_response_code(404);
            echo "404 Not Found";
        }
    }
}



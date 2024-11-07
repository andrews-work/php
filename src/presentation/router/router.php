<?php

namespace framework\presentation\router;

class router
{
    private $routes = [];
    private static $instance;

    private function __construct() {}

    // instance
    public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    // get
    public function get($path, $controller)
    {
        $this->routes['GET'][$path] = [
            'controller' => $controller,
            'middleware' => []
        ];
        return $this;
    }

    // post
    public function post($path, $controller)
    {
        $this->routes['POST'][$path] = [
            'controller' => $controller,
            'middleware' => []
        ];
        return $this;
    }

    // put
    public function put($path, $controller)
    {
        $this->routes['PUT'][$path] = [
            'controller' => $controller,
            'middleware' => []
        ];
        return $this;
    }

    // delete
    public function delete($path, $controller)
    {
        $this->routes['DELETE'][$path] = [
            'controller' => $controller,
            'middleware' => []
        ];
        return $this;
    }

    // middleware
    public function middleware($middleware)
    {
        // get method + uri
        $method = $_SERVER['REQUEST_METHOD'];
        $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

        // add middleware
        if (isset($this->routes[$method][$uri])) {
            $this->routes[$method][$uri]['middleware'][] = $middleware;
        }

        return $this;
    }

    // dispatch
    public function dispatch()
    {
        $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $method = $_SERVER['REQUEST_METHOD'];

        if (isset($this->routes[$method][$uri])) {
            $route = $this->routes[$method][$uri];

            $controller = $route['controller'];
            $middleware = $route['middleware'];

            // add middleware
            foreach ($middleware as $middlewareClass) {
                $middlewareInstance = new $middlewareClass();
                $response = $middlewareInstance->handle($_REQUEST, $_SERVER);

                // error
                if ($response) {
                    echo $response;
                    return;
                }
            }

            // call controller 
            call_user_func_array([new $controller[0], $controller[1]], []);
        } else {
            http_response_code(404);
            echo "404 Not Found";
        }
    }

    // static methods
    public static function __callStatic($name, $arguments)
    {
        $instance = self::getInstance();
        return call_user_func_array([$instance, $name], $arguments);
    }
}

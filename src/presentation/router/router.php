<?php

namespace framework\presentation\router;

class router
{
    private $routes = [];
    private static $instance;

    private function __construct() {}

    public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    // Register GET routes
    public function get($path, $controller)
    {
        $this->routes['GET'][$path] = [
            'controller' => $controller,
            'middleware' => []
        ];
        return $this;
    }

    // Register POST routes
    public function post($path, $controller)
    {
        $this->routes['POST'][$path] = [
            'controller' => $controller,
            'middleware' => []
        ];
        return $this;
    }

    // Register PUT routes
    public function put($path, $controller)
    {
        $this->routes['PUT'][$path] = [
            'controller' => $controller,
            'middleware' => []
        ];
        return $this;
    }

    // Register DELETE routes
    public function delete($path, $controller)
    {
        $this->routes['DELETE'][$path] = [
            'controller' => $controller,
            'middleware' => []
        ];
        return $this;
    }

    // Attach middleware to the route
    public function middleware($middleware)
    {
        $method = $_SERVER['REQUEST_METHOD']; // Determine the request method (GET, POST, etc.)
        $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH); // Get the current URI

        if (isset($this->routes[$method][$uri])) {
            $this->routes[$method][$uri]['middleware'][] = $middleware;
        }
        return $this; // Allow method chaining
    }

    // Dispatch the request
    public function dispatch()
    {
        $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $method = $_SERVER['REQUEST_METHOD'];

        if (isset($this->routes[$method][$uri])) {
            $route = $this->routes[$method][$uri];
            $controller = $route['controller'];
            $middleware = $route['middleware'];

            // Execute middleware (if any)
            foreach ($middleware as $middlewareClass) {
                $middlewareInstance = new $middlewareClass();
                $response = $middlewareInstance->handle($_REQUEST, $_SERVER);
                if ($response) {
                    // If middleware returns a response, stop further processing
                    echo $response;
                    return;
                }
            }

            // Call the controller if middleware doesn't halt the process
            call_user_func_array([new $controller[0], $controller[1]], []);
        } else {
            http_response_code(404);
            echo "404 Not Found";
        }
    }

    // Static access to methods
    public static function __callStatic($name, $arguments)
    {
        $instance = self::getInstance();
        return call_user_func_array([$instance, $name], $arguments);
    }
}

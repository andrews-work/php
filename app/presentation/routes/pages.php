<?php

namespace app\presentation\routes;

# files
use app\presentation\controllers\guest;
use framework\presentation\router\router;

require_once 'auth.php';

# start
$router = router::getInstance();

// Public Routes
$router -> get ('/', [guest::class, 'index']);
$router -> get ('/about', [guest::class, 'about']);
$router -> get ('/contact', [guest::class, 'contact']);
$router -> get ('/register', [guest::class, 'register']);
$router -> get ('/login', [guest::class, 'login']);

// authenticated routes
// $router->get('/dashboard', [guest::class, 'dashboard'])->middleware(AuthMiddleware::class);

// Dispatch the router
$router->dispatch();
<?php

namespace app\presentation\routes;

# files
use app\presentation\controllers\guest;
use framework\presentation\router\router;

# start
$router = router::getInstance();

# basic routes
$router->get('/', [guest::class, 'index']);
$router->get('/about', [guest::class, 'about']);
$router->get('/contact', [guest::class, 'contact']);
$router->get('/register', [guest::class, 'register']);
$router->get('/login', [guest::class, 'login']);

$router->dispatch();
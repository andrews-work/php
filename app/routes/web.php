<?php

require_once __DIR__ . '/../../src/router.php';

# files
use app\controllers\auth;
use app\controllers\home;

# start
$router = new router();

# basic routes
$router->get('/', [home::class, 'index']);
$router->get('/about', [home::class, 'about']);
$router->get('/contact', [auth::class, 'contact']);
$router->get('/register', [auth::class, 'register']);

$router->dispatch();
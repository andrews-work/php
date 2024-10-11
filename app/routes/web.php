<?php

require_once __DIR__ . '/../../src/router.php';

# files
use app\controllers\guest;

# start
$router = new router();

# basic routes
$router->get('/', [guest::class, 'index']);
$router->get('/about', [guest::class, 'about']);
$router->get('/contact', [guest::class, 'contact']);
$router->get('/register', [guest::class, 'register']);
$router->get('/login', [guest::class, 'login']);

$router->dispatch();
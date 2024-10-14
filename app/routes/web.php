<?php

# files
use app\controllers\guest;
use framework\presentation\router\router;

# start
$router = new router();

# basic routes
$router->get('/', [guest::class, 'index']);
$router->get('/about', [guest::class, 'about']);
$router->get('/contact', [guest::class, 'contact']);
$router->get('/register', [guest::class, 'register']);
$router->get('/login', [guest::class, 'login']);

$router->dispatch();
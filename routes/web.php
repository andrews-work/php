<?php

require_once 'router.php';

# files
use app\controllers\auth;
use app\controllers\home;

# start
$router = new router();

# basic routes
$router->get('/', [home::class, 'index']);
$router->get('/about', [home::class, 'about']);
$router->get('/register', [auth::class, 'register']);


$router->dispatch();
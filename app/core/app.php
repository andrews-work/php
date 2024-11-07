<?php

namespace app\core;

use framework\framework;
use framework\utils\logs\logs;

// Include the framework's entry file
require_once './../src/app.php';

// Get the framework's container instance
$container = framework::getContainer();

// Include the router file to set up the routes
require_once './app/presentation/routes/pages.php';
logs::info('App started');

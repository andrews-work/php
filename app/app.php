<?php

namespace app;

use framework\framework;

// Include the framework's entry file
require_once '../src/app.php';

// Get the framework's container instance
// $container = framework::getContainer();
framework::init();

// Include the router file to set up the routes
require_once '../app/presentation/routes/pages.php';

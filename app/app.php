<?php

namespace app;

use framework\utils\logs\logs;
use framework\framework;

// Include the framework's entry file
require_once '../src/app.php';

// Get the framework's container instance
$container = framework::getContainer();

// Include the router file to set up the routes
require_once 'presentation/routes/web.php';

logs::start('App started');




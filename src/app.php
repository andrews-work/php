<?php

namespace framework;

require_once 'vendor/autoload.php';
require_once 'src/utils/containers/container.php';

use framework\config\services;
use framework\utils\containers\start;

$container = new start();
services::configure($container);


$logger = $container->get('logs');
$logger->info('Application started');
$logger->error('error');

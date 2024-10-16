<?php

namespace framework;

require_once '../vendor/autoload.php';
require_once 'utils/containers/start.php';

use framework\config\services;
use framework\utils\containers\start;
use framework\utils\logs\logs;
use framework\presentation\router\router;

class framework
{
    private static $container;

    public static function getContainer()
    {
        if (self::$container === null) {
            self::$container = new start();
            services::configure(self::$container);

            // Use the logging class directly with static methods
            logs::start('Framework started');
        }

        return self::$container;
    }
}

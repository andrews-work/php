<?php

namespace framework\config;

use framework\utils\logs\logs;
use framework\presentation\router\router;

class services
{
    public static function configure($container)
    {
        self::configureLogging($container);
        self::configureRouting($container);
    }

    private static function configureLogging($container)
    {
        // Load log configuration
        $logConfig = require __DIR__ . '/logs.php';
        $container->set('logs', logs::getInstance($logConfig['log_file'], $logConfig['log_level'], $logConfig['project_root']));
    }

    private static function configureRouting($container)
    {
        $container->set('router', router::getInstance());
    }
}

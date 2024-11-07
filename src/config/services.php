<?php

namespace framework\config;

use framework\utils\logs\logs;
use framework\presentation\router\router;
use framework\database\db;

class services
{
    public static function configure($container)
    {
        self::configureLogging($container);
        self::configureRouting($container);
        // self::configureDatabase($container);
    }

    private static function configureLogging($container)
    {
        $logConfig = require __DIR__ . '/logs.php';
        $container -> set ('logs', logs::getInstance($logConfig['log_file'], $logConfig['log_level'], $logConfig['project_root']));
    }

    private static function configureRouting($container)
    {
        $container-> set ('router', router::getInstance());
    }

    // private static function configureDatabase($container)
    // {
    //     $container -> set ('database', db::getInstance());
    // }

}

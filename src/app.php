<?php

namespace framework;

require_once '../vendor/autoload.php';

use framework\utils\containers\start;
use framework\config\services;
use framework\app\handlers\errors;

class framework
{
    private static $container;

    public static function getContainer()
    {
        if (self::$container === null) {
            self::$container = new start();
            services::configure(self::$container);
        }

        return self::$container;
    }

    public static function init()
    {
        self::getContainer();
        errors::init();
    }
}
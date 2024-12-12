<?

namespace framework\core;

// var_dump(class_exists('framework\\data\\migration'));

require_once './../vendor/autoload.php';

use framework\core\container;
use framework\core\services;
use framework\app\handlers\errors;

class framework
{
    private static $container;

    public static function getContainer()
    {
        if (self::$container === null) {
            self::$container = new container();
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

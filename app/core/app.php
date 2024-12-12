<?

namespace app\core;

use app\core\services;
use app\core\container;


class app
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
    }
}

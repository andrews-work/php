<?

namespace app\core;

use app\core\loaders\migration; 
use framework\utils\logs\logs;

class services
{
    public static function configure($container)
    {
        logs::info('test');
        self::configureCoreServices($container);
        logs::info('test1');
    }

    private static function configureCoreServices($container)
    {
        migration::load($container);  // Loads migration classes
    }

    // private static function configureAppServices($container)
    // {
    //     // You can create additional loaders in app/app/services/ to register specific app services
    //     $container->set('userService', \app\app\services\userService::class);
    //     $container->set('emailService', \app\app\services\emailService::class);
    // }
}

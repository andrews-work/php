<?

namespace app\core\loaders;

use app\data\migrations\user;
use framework\utils\logs\logs;

class migration
{
    public static function load($container)
    {
        logs::info('test4');
        $container->set('userMigration', user::class);
    }
}

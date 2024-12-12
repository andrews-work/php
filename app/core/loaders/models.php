<?

namespace app\core\loaders;

use app\data\models\user;

class model
{
    public static function load($container)
    {
        $container->set('userModel', user::class);
    }
}

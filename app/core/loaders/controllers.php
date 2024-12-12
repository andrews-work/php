<?

namespace app\core\loaders;

use app\presentation\controllers\auth;
use app\presentation\controllers\user;

class controllers
{
    public static function load($container)
    {
        $container->set('authController', auth::class);
        $container->set('userController', user::class);
    }
}

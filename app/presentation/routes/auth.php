<?

namespace app\presentation\routes;

#files
use framework\presentation\router\router;
use app\presentation\controllers\auth;

#start
$router = router::getInstance();

#register
$router -> post ('/register', [auth::class, 'register']);

#login
$router -> post ('/login', [auth::class, 'login']);

#logout
$router -> post ('/logout', [auth::class, 'logout']);

#forgot
$router -> post ('/forgot', [auth::class, 'forgot']);

#delete
$router -> delete ('/delete', [auth::class, 'delete']);
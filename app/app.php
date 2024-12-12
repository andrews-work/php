<?

namespace app;

use framework\core\framework;
use app\core\app;

require_once '../src/core/app.php';

framework::init();
app::init();

// main router
require_once '../app/presentation/routes/pages.php';

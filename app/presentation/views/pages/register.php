<?

// layout - public
require_once __DIR__ . '/../layouts/public.php';

// content - start
ob_start();

// components/sections/views
include __DIR__ . '/../components/form/register.php';

// content - end
$content = ob_get_clean();

// render
renderLayout('Register', $content);
?>

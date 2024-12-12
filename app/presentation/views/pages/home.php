<?

// Include the layout and class files
require_once __DIR__ . '/../layouts/public.php';

// Content - start
ob_start();

    // section 1
    include __DIR__ . '/../components/template/hero.php';

    // section 2

// Content - end
$content = ob_get_clean();

// Render
renderLayout('Home', $content);

?>

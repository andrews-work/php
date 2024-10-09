<?php
// Include the layout file
include __DIR__ . '/../layouts/public.php';

$title = 'about';

// Start output buffering
ob_start();

// Include the components
include __DIR__ . '/../components/template/hero.php';
include __DIR__ . '/../components/template/about.php';

// Get the buffered content
$content = ob_get_clean();

// Render the layout with the content
renderLayout('about', $content);
?>

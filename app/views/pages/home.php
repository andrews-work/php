<?php
// Include the layout file
include __DIR__ . '/../layouts/public.php';

// Start output buffering
ob_start();

// Include the components
include __DIR__ . '/../components/template/hero.php';
include __DIR__ . '/../components/template/icons.php';

// Get the buffered content
$content = ob_get_clean();

// Render the layout with the content
renderLayout('Homepage', $content);
?>

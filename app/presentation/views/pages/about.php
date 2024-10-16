<?php

// layout - public
include __DIR__ . '/../layouts/public.php';

// content - start
ob_start();

// components
include __DIR__ . '/../components/template/about.php';

// content - end
$content = ob_get_clean();

// render
renderLayout('about', $content);
?>

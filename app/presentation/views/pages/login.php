<?php

// layout - public
require_once __DIR__ . '/../layouts/public.php';

// content - start
ob_start();

// components/sections
// include __DIR__ . '/../components/form/login.php';
// components
include __DIR__ . '/../components/template/about.php';

// content - end
$content = ob_get_clean();

// render
renderLayout('Login', $content);
?>

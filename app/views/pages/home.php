<?php

// Define the title and content variables
$title = "Home";
$content = '
    <h1 class="bg-red-300 text-center">Welcome to the Home Page</h1>
    <p>This is the home page content.</p>
';

// Define the root directory and include the layout file in one line
include (define('ROOT_DIR', realpath(dirname(__FILE__) . '/../../../')) ? ROOT_DIR : '') . '/app/views/layouts/public.php';

?>

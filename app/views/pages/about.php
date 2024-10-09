<?php

// Define the title and content variables
$title = "Home";
$content = '
    <div>
        <h1 class="text-2xl font-bold text-white text-center d h-20">About Us</h1>
        <p>This is the about page.</p>
    </div>

';

// Define the root directory and include the layout file in one line
include (define('ROOT_DIR', realpath(dirname(__FILE__) . '/../../../')) ? ROOT_DIR : '') . '/app/views/layouts/public.php';

?>
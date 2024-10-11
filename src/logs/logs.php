<?php

require_once __DIR__ . '/logger.php';

use src\logs\Logger;

$logFile = __DIR__ . '/../../app/log.log';

// Ensure the log directory exists
if (!file_exists(dirname($logFile))) {
    mkdir(dirname($logFile), 0777, true);
}

$logger = new Logger($logFile);

// Make the logger globally accessible
global $logger;

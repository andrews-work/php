<?php

namespace src\utils;

use src\utils\handlers\error;
use src\utils\handlers\ShutdownHandler;
use src\utils\handlers\ExceptionHandler;

class errorHandler
{
    public static function register()
    {
        set_error_handler([ErrorHandler::class, 'handleError']);
        set_exception_handler([ExceptionHandler::class, 'handleException']);
        register_shutdown_function([ShutdownHandler::class, 'handleShutdown']);
    }
}

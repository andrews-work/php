<?php

namespace src\utils\handlers;

class ShutdownHandler
{
    public static function handleShutdown()
    {
        $error = error_get_last();
        if ($error !== null && in_array($error['type'], [E_ERROR, E_CORE_ERROR, E_COMPILE_ERROR, E_USER_ERROR])) {
            $errfile = ErrorHandler::modifyFilePath($error['file']);
            ErrorHandler::displayError('Fatal Error', $error['type'], $error['message'], $errfile, $error['line'], debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS, 10));
        }
    }
}

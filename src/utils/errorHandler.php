<?php

namespace src\utils;

class errorHandler
{
    public static function register()
    {
        set_error_handler([__CLASS__, 'handleError']);
        set_exception_handler([__CLASS__, 'handleException']);
        register_shutdown_function([__CLASS__, 'handleShutdown']);
    }

    public static function handleError($errno, $errstr, $errfile, $errline)
    {
        self::displayError($errno, $errstr, $errfile, $errline);
    }

    public static function handleException($exception)
    {
        self::displayError($exception->getCode(), $exception->getMessage(), $exception->getFile(), $exception->getLine());
    }

    public static function handleShutdown()
    {
        $error = error_get_last();
        if ($error !== null) {
            self::displayError($error['type'], $error['message'], $error['file'], $error['line']);
        }
    }

    private static function displayError($errno, $errstr, $errfile, $errline)
    {
        http_response_code(500);
        echo "<h1>Error</h1>";
        echo "<p><strong>Error Code:</strong> {$errno}</p>";
        echo "<p><strong>Error Message:</strong> {$errstr}</p>";
        echo "<p><strong>File:</strong> {$errfile}</p>";
        echo "<p><strong>Line:</strong> {$errline}</p>";
        echo "<pre>" . debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS, 10) . "</pre>";
    }
}

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
    echo "<div class='container p-4 mx-auto'>";
    echo "<h1 class='text-2xl font-bold text-red-600'>Error</h1>";
    echo "<p class='mt-2'><strong>Error Code:</strong> {$errno}</p>";
    echo "<p class='mt-2'><strong>Error Message:</strong> {$errstr}</p>";
    echo "<p class='mt-2'><strong>File:</strong> {$errfile}</p>";
    echo "<p class='mt-2'><strong>Line:</strong> {$errline}</p>";
    echo "<pre class='p-4 mt-4 bg-gray-100 rounded'>" . print_r(debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS, 10), true) . "</pre>";
    echo "</div>";
}

}

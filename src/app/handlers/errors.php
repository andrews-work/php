<?php

namespace framework\app\handlers;

class errors {
    public static function init()
    {
        // Set custom error handler
        set_error_handler([self::class, 'handleError']);

        // Set custom exception handler
        set_exception_handler([self::class, 'handleException']);

        // Optionally handle fatal errors
        register_shutdown_function([self::class, 'handleShutdown']);
    }

    // Handle normal PHP errors
    public static function handleError($errno, $errstr, $errfile, $errline)
    {
        $errorData = [
            'type' => 'Error',
            'errno' => $errno,
            'message' => $errstr,
            'file' => $errfile,
            'line' => $errline,
            'trace' => debug_backtrace()
        ];

        // Always show the detailed error page in development (for now)
        self::displayErrorPage($errorData);
    }

    // Handle uncaught exceptions
    public static function handleException($exception)
    {
        $exceptionData = [
            'type' => 'Exception',
            'message' => $exception->getMessage(),
            'file' => $exception->getFile(),
            'line' => $exception->getLine(),
            'trace' => $exception->getTrace()
        ];

        // Always show the detailed error page in development (for now)
        self::displayErrorPage($exceptionData);
    }

    // Handle fatal errors
    public static function handleShutdown()
    {
        $error = error_get_last();
        if ($error) {
            self::handleError($error['type'], $error['message'], $error['file'], $error['line']);
        }
    }

    // Display the error page
    public static function displayErrorPage($errorData)
    {
        // Include the error page template
        // include '../../presentation/views/pages/error.php';
        include './src/presentation/views/pages/error.php';
    }

    // Log errors to a file or logging service (optional)
    public static function logError($errorData)
    {
        file_put_contents('error_log.txt', json_encode($errorData) . PHP_EOL, FILE_APPEND);
    }

    // Display a generic error page (optional for production)
    public static function displayGenericErrorPage()
    {
        echo "<h1>Something went wrong. Please try again later.</h1>";
    }
}
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
            'file' => self::formatFilePath($errfile),
            'line' => $errline,
            'trace' => self::formatStackTrace(debug_backtrace())  // Format the stack trace
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
            'file' => self::formatFilePath($exception->getFile()),
            'line' => $exception->getLine(),
            'trace' => self::formatStackTrace($exception->getTrace())  // Format the stack trace
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
        include './src/presentation/views/pages/error.php';
    }

    // Format file path to display relative paths from the 'app' directory
    private static function formatFilePath($filePath)
    {
        $baseDir = '/app'; // The part of the path you want to keep
        
        // Strip everything before the '/app' directory
        return strstr($filePath, '/app'); // Remove everything before '/app'
    }

    // Format the stack trace to adjust file paths
    private static function formatStackTrace($stackTrace)
    {
        // Loop through each frame of the stack trace
        foreach ($stackTrace as &$frame) {
            if (isset($frame['file'])) {
                // Format the file path for each stack trace frame
                $frame['file'] = self::formatFilePath($frame['file']);
            }

            // Now let's format the arguments (args) in each frame
            if (isset($frame['args'])) {
                $frame['args'] = self::formatStackTraceArgs($frame['args']);  // Sanitize the args if they contain paths
            }
        }

        return $stackTrace;
    }

    // Format and sanitize the arguments (args) in the stack trace
    private static function formatStackTraceArgs($args)
    {
        foreach ($args as &$arg) {
            if (is_string($arg) && strpos($arg, '/app') !== false) {
                // If the argument is a string containing a file path, sanitize it
                $arg = self::formatFilePath($arg);
            }
        }

        return $args;
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

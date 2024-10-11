<?php

namespace src\utils\handlers;

class ErrorHandler
{
    public static function handleError($errno, $errstr, $errfile, $errline)
    {
        $type = self::getErrorType($errno);
        $errfile = self::modifyFilePath($errfile);
        self::displayError($type, $errno, $errstr, $errfile, $errline, debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS, 10));
    }

    private static function getErrorType($errno)
    {
        switch ($errno) {
            case E_WARNING:
                return 'Warning';
            case E_NOTICE:
                return 'Notice';
            case E_DEPRECATED:
                return 'Deprecated';
            default:
                return 'Error';
        }
    }

    private static function modifyFilePath($errfile)
    {
        $keyword = 'root';
        $pos = strpos($errfile, $keyword);
        if ($pos !== false) {
            $errfile = substr($errfile, $pos);
        }
        // Debug statement
        error_log("Modified file path: {$errfile}");
        return $errfile;
    }

    private static function displayError($type, $errno, $errstr, $errfile, $errline, $backtrace)
    {
        $httpCode = self::getHttpCode($type);
        $color = self::getColor($type);

        http_response_code($httpCode);
        echo "<div class='container p-4 mx-auto'>";
        echo "<h1 class='text-2xl font-bold {$color}'>{$type}</h1>";
        echo "<p class='mt-2'><strong>Error Code:</strong> {$errno}</p>";
        echo "<p class='mt-2'><strong>Error Message:</strong> {$errstr}</p>";
        echo "<p class='mt-2'><strong>File:</strong> {$errfile}</p>";
        echo "<p class='mt-2'><strong>Line:</strong> {$errline}</p>";
        echo "<h2 class='mt-4 text-xl font-bold'>Backtrace</h2>";
        echo "<pre class='p-4 mt-4 bg-gray-100 rounded'>" . self::formatBacktrace($backtrace) . "</pre>";
        echo "</div>";
    }

    private static function getHttpCode($type)
    {
        switch ($type) {
            case 'Warning':
                return 400;
            case 'Notice':
                return 400;
            case 'Deprecated':
                return 400;
            default:
                return 500;
        }
    }

    private static function getColor($type)
    {
        switch ($type) {
            case 'Warning':
                return 'text-yellow-600';
            case 'Notice':
                return 'text-blue-600';
            case 'Deprecated':
                return 'text-purple-600';
            default:
                return 'text-red-600';
        }
    }

    private static function formatBacktrace($backtrace)
    {
        $output = '';
        foreach ($backtrace as $index => $trace) {
            $file = self::modifyFilePath(isset($trace['file']) ? $trace['file'] : 'Unknown');
            $output .= "<div class='mb-2'>";
            $output .= "<strong>#{$index}</strong><br>";
            $output .= "<strong>File:</strong> {$file}<br>";
            $output .= "<strong>Line:</strong> " . (isset($trace['line']) ? $trace['line'] : 'Unknown') . "<br>";
            $output .= "<strong>Function:</strong> " . (isset($trace['function']) ? $trace['function'] : 'Unknown') . "<br>";
            $output .= "</div>";
        }
        return $output;
    }
}

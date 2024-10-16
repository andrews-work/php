<?php

namespace framework\utils\logs;

class logs
{
    protected $logFile;
    protected $logLevel;
    protected $projectRoot;
    private static $instance;

    private function __construct($logFile, $logLevel = 'info', $projectRoot = '')
    {
        $this->logFile = $logFile;
        $this->logLevel = $logLevel;
        $this->projectRoot = rtrim($projectRoot, DIRECTORY_SEPARATOR);
    }

    public static function getInstance($logFile, $logLevel = 'info', $projectRoot = '')
    {
        if (self::$instance === null) {
            self::$instance = new self($logFile, $logLevel, $projectRoot);
        }
        return self::$instance;
    }

    public function log($level, $message)
    {
        if ($this->shouldLog($level)) {
            $timestamp = date('Y-m-d H:i:s');
            $caller = $this->getCallerInfo();
            $file = $caller['file'];
            $line = $caller['line'];

            $logEntry = "Timestamp: $timestamp" . PHP_EOL .
                        "Level: $level" . PHP_EOL .
                        "Message: $message" . PHP_EOL .
                        "File: $file" . PHP_EOL .
                        "Line: $line" . PHP_EOL .
                        str_repeat('=', 40) . PHP_EOL;

            file_put_contents($this->logFile, $logEntry, FILE_APPEND);
        }
    }

    protected function shouldLog($level)
    {
        $levels = ['debug', 'info', 'warning', 'error'];
        return array_search($level, $levels) >= array_search($this->logLevel, $levels);
    }

    protected function getCallerInfo()
    {
        $backtrace = debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS, 2);
        $file = isset($backtrace[1]['file']) ? $backtrace[1]['file'] : 'unknown';

        // Remove the project root path from the file path
        if ($this->projectRoot && strpos($file, $this->projectRoot) === 0) {
            $file = substr($file, strlen($this->projectRoot) + 1);
        }

        return [
            'file' => $file,
            'line' => isset($backtrace[1]['line']) ? $backtrace[1]['line'] : 'unknown',
        ];
    }

    public static function debug($message) {
        self::getInstance($message)->log('debug', $message);
    }

    public static function start($message) {
        self::getInstance($message)->log('start', $message);
    }

    public static function info($message) {
        self::getInstance($message)->log('info', $message);
    }

    public static function warning($message) {
        self::getInstance($message)->log('warning', $message);
    }

    public static function error($message) {
        self::getInstance($message)->log('error', $message);
    }
}

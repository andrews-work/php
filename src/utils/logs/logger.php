<?php

namespace framework\utils\logs;

class logger
{
    protected $logFile;
    protected $logLevel;
    protected $projectRoot;

    public function __construct($logFile, $logLevel = 'info', $projectRoot = '')
    {
        $this->logFile = $logFile;
        $this->logLevel = $logLevel;
        $this->projectRoot = rtrim($projectRoot, DIRECTORY_SEPARATOR);
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
    

    public function debug($message)
    {
        $this->log('debug', $message);
    }

    public function info($message)
    {
        $this->log('info', $message);
    }

    public function warning($message)
    {
        $this->log('warning', $message);
    }

    public function error($message)
    {
        $this->log('error', $message);
    }
}

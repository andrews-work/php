<?php

class logger
{
    private $logFile;

    public function __construct($logFile)
    {
        $this->logFile = $logFile;
    }

    public function log($message, $level = 'info')
    {
        $backtrace = debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS, 2);
        $caller = array_shift($backtrace);
    
        $timestamp = date('Y-m-d H:i:s');
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

    public function info($message)
    {
        $this->log($message, 'info');
    }

    public function error($message)
    {
        $this->log($message, 'error');
    }

    public function warning($message)
    {
        $this->log($message, 'warning');
    }

    public function debug($message)
    {
        $this->log($message, 'debug');
    }
}

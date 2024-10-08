<?php

namespace app\services;

class logger
{
    private $logFile;

    public function __construct($logFile = 'app.log')
    {
        $this->logFile = __DIR__ . '/../../storage/logs/' . $logFile;
    }

    public function log($message)
    {
        $timestamp = date('Y-m-d H:i:s');
        $logEntry = "[$timestamp] $message\n";
        file_put_contents($this->logFile, $logEntry, FILE_APPEND);
    }

    public function error($message)
    {
        $this->log("ERROR: $message");
    }

    public function info($message)
    {
        $this->log("INFO: $message");
    }
}

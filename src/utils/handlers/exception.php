<?php

namespace src\utils\handlers;

class ExceptionHandler
{
    public static function handleException($exception)
    {
        $errfile = ErrorHandler::modifyFilePath($exception->getFile());
        ErrorHandler::displayError('Exception', $exception->getCode(), $exception->getMessage(), $errfile, $exception->getLine(), $exception->getTrace());
    }
}

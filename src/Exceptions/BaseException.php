<?php
namespace Nirmalsharma\LaravelKafkaPhp\Exceptions;
use Exception;

class BaseException extends Exception {
    public function __construct($message)
    {
        # Append class name with error message
        $class = str_replace(__NAMESPACE__ . '\\', '', get_class($this));
        $message = implode(" | ", [$class, $message]);

        parent::__construct($message);
    }
}
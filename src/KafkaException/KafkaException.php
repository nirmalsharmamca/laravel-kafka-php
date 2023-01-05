<?php 

namespace Nirmalsharma\LaravelKafkaPhp\KafkaException;

use Exception;

class KafkaException extends Exception
{

    /**
     * Custom Error Message
     *
     * @return void
     */
    public function customFunction() {
        $errorMsg = 'Error on line '.$this->getLine().' in '.$this->getFile()
        .': <b>'.$this->getMessage().'</b> is not a valid password. Please enter a valid one.';
        return $errorMsg;
    }
}
<?php

namespace App\Handlers;


use Nirmalsharma\LaravelKafkaPhp\Exceptions\KafkaConsumerException;

class TestHandler
{
    public function __invoke( $message)
    {
        dump([ 
            "partition" => $message['raw']->partition, 
            "key" => $message['key'] 
        ]);
        throw new KafkaConsumerException('not a business logic here.');
    }
}

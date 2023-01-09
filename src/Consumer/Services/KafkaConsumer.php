<?php

/**
 * Kafka Wrapper which is used to consume tasks from Kafka
 * This file takes care of the conversation between PHP and Kafka
 */

namespace Nirmalsharma\LaravelKafkaPhp\Consumer\Services;

use Nirmalsharma\LaravelKafkaPhp\Consumer\Handlers\KafkaConsumerHandler;

abstract class KafkaConsumer {

    /**
     * Create Consumer function
     *
     * @return $consumer
     */
    public static function createConsumer($handler) {
        $consumer = app(KafkaConsumerHandler::class);
        return $consumer->createConsumer($handler);
    }
}
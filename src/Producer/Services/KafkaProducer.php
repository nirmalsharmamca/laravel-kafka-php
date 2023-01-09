<?php

/**
 * Kafka Wrapper which is used to push tasks into Kafka
 * This file takes care of the conversation between PHP and Kafka
 */

namespace Nirmalsharma\LaravelKafkaPhp\Producer\Services;

use Nirmalsharma\LaravelKafkaPhp\Producer\Handlers\KafkaProducerHandler;

abstract class KafkaProducer {

    private static function isKafkaEnabled() {
        return config("kafka.is_enabled");
    }

    /**
     * Push data into kafka
     * @param  string $topic   Indicates Kafka Topic
     * @param  string $key     Indicates Kafka key
     * @param  array  $data    Indicates Kafka data
     * @param  array  $headers Indicates Kafka headers
     * @return void
     */
    public static function push(string $topic, array $data, string $key = null, array $headers = []) {
        if (self::isKafkaEnabled()) {
            $obj = app(KafkaProducerHandler::class);
            $obj->setTopic($topic);
            $obj->setMessage($data);

            if ($headers)
                $obj->setHeaders($headers);

            if ($key)
                $obj->setKey($key);

            $obj->send();
        }
    }
}
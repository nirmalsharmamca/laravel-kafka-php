<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Kafka Brokers URL
    |--------------------------------------------------------------------------
    |
    */

    'brokers' => env('KAFKA_BROKERS', ''),

    /*
    |--------------------------------------------------------------------------
    | Debug Kafka events default = false
    |--------------------------------------------------------------------------
    |
    */

    'debug' => env('KAFKA_DEBUG', false),

    /*
    |--------------------------------------------------------------------------
    | Kafka On/Off switch to produce kafka message event. default =1
    |--------------------------------------------------------------------------
    |
    */

    'is_enabled' => env('IS_KAFKA_ENABLED', 1),

    /*
    |--------------------------------------------------------------------------
    | Kafka SSL Protocol {plaintext, ssl, sasl_plaintext, sasl_ssl}
    |--------------------------------------------------------------------------
    |
    */

    'ssl_protocol' => env('KAFKA_SSL_PROTOCOL', 'plaintext'),

    /*
    |--------------------------------------------------------------------------
    | Kafka Compression Type {none, gzip, snappy, lz4, zstd}, default= snappy
    |--------------------------------------------------------------------------
    |
    */

    'compression_type' => env('KAFKA_COMPRESSION_TYPE', 'none'),

    /*
    |--------------------------------------------------------------------------
    | Kafka Idempotence {true, false}, default= true
    |--------------------------------------------------------------------------
    |
    */

    'idempotence' => env('KAFKA_IDEMPOTENCE', false),

    /*
    |--------------------------------------------------------------------------
    | Kafka consumer group id
    |--------------------------------------------------------------------------
    |
    */

    'consumer_group_id' => env('KAFKA_CONSUMER_GROUP_ID', 'kafka-cg'),

    /*
    |--------------------------------------------------------------------------
    | Kafka offset reset {smallest, earliest, beginning, largest, latest, end, error}, default=latest
    |--------------------------------------------------------------------------
    |
    */

    'offset_reset' => env('KAFKA_OFFSET_RESET', 'latest'),

    /*
    |--------------------------------------------------------------------------
    | Kafka auto commit (true, false), default = true
    |--------------------------------------------------------------------------
    |
    */

    'auto_commit' => env('KAFKA_AUTO_COMMIT', true),

     /*
    |--------------------------------------------------------------------------
    | Kafka error sleep (Not in use for now)
    |--------------------------------------------------------------------------
    |
    */

    'error_sleep' => env('KAFKA_ERROR_SLEEP', 5),

     /*
    |--------------------------------------------------------------------------
    | Kafka partition default = null
    |--------------------------------------------------------------------------
    |
    */

    'partition' => env('KAFKA_PARTITION', null),

     /*
    |--------------------------------------------------------------------------
    | Kafka topic
    |--------------------------------------------------------------------------
    |
    */

    'topic' => env('KAFKA_TOPIC', ""),

    /*
    |--------------------------------------------------------------------------
    | Kafka dlq_topic
    |--------------------------------------------------------------------------
    |
    */

    'dlq_topic' => env('KAFKA_DLQ_TOPIC', ""),

];

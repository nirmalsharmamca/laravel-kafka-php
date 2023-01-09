<?php
namespace App\Classes;

use Carbon\Carbon;
// use Nirmalsharma\LaravelKafkaPhp\Producer\Services\KafkaProducer;
use KafkaProducer;

abstract class KafkaProducerEvent {

    public static function publish(string $user_reference, string $msg, string $topic): void{
       
        // $topic = "multi-parition-test";
        $headers = [
            "Content-Type"   => "application/json",
            "Schema-URL"     => "user-attributes-kafka_producer_consumer_test",
            "Schema-Subject" => "user-attributes-kafka_producer_consumer_test",
            "Schema-Version" => 1,
        ];

        $event_body = [
            "namespace" => "Local Test",
            "name"      => "kafka_producer_consumer_test",
            "data"      => [
                "user_reference" => $user_reference,
                "demo_message"          => $msg,
                "created_at"            => Carbon::now('UTC'),
            ],
        ];
        KafkaProducer::push($topic, $event_body, 'IDEP176298793488NIRMAL'.$user_reference, $headers);
    
    }
}

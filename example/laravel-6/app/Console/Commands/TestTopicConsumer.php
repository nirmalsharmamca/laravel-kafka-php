<?php

namespace App\Console\Commands;

use App\Handlers\TestHandler;
use Exception;
use Illuminate\Console\Command;
// use KafkaConsumer;
use Nirmalsharma\LaravelKafkaPhp\Consumer\Services\KafkaConsumer;

class TestTopicConsumer extends Command
{
    /**
     * command example:
     * php artisan kafka:test-consume --consumer-group=test-local --topic=test --dlq-topic=test-dlq
     *  
     */
    protected $signature = 'kafka:test-consume {--partition=} {--consumer-group=} {--topic=} {--dlq-topic=}';

    protected $description = 'Command description';

    public function handle(): void
    {
        $this->setKafkaConfig();
        KafkaConsumer::createConsumer( new TestHandler);
    }

    public function setKafkaConfig(){
        $partition = $this->option('partition');
        if( $partition != null){
            config([
                "kafka.partition" => $partition
            ]);
        }

        $consumer_group_id = $this->option('consumer-group');
        if( !empty($consumer_group_id)){
            config([
                "kafka.consumer_group_id" => $consumer_group_id
            ]);
        }

        $topic = $this->option('topic');
        if( !empty($topic)){
            config([
                "kafka.topic" => $topic
            ]);
        }

        $dlq_topic = $this->option('dlq-topic');
        if( !empty($dlq_topic)){
            config([
                "kafka.dlq_topic" => $dlq_topic
            ]);
        }
        
    }
}

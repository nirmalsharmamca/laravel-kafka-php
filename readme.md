## A Lightweight Kafka wrapper for Laravel 6+ and PHP 7.3+

Install Kafka wrapper

```bash
  composer require nirmalsharma/laravel-kafka-php
```


## Examples
[Laravel 6](examples/laravel-6)


## Use Kafka producer in code.

Add following in web.php

```bash
use KafkaProducer;

$topic = "kafka-topic";
$data = [
    "user_ref" => "usr.123456",
    "message" => "Hello World"
];
$key = "usr.123456"; // Optional, Default null
$headers = [
    "ContentType" => "application/json",
    "Timezone" => "GMT +05:30"
]; // Optional
KafkaProducer::push($topic, $data, $key, $headers);

```

## Use Kafka consumer in code.

KafkaConsumer code for console

```bash
namespace App\Console\Commands;

use App\Handlers\TestHandler;
use Illuminate\Console\Command;
use KafkaConsumer;

class TestTopicConsumer extends Command
{
    protected $signature = 'kafka:test-consume {--partition=} {--consumer-group=} {--topic=} {--dlq-topic=}';

    protected $description = 'Kafka consumer!!';

    public function handle(): void
    {
      KafkaConsumer::createConsumer(new TestHandler);
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

TestHandler.php
-----------------

namespace App\Handlers;

use Illuminate\Support\Facades\Log;

class TestHandler
{
  public function __invoke( $message)
  {   
    dump([ 
      "partition" => $message['raw']->partition, 
      "key" => $message['key'] 
    ]);
  }
}

```

## To start listening messages by run following command: 

```
  php artisan kafka:test-consume --consumer-group=test-local --topic=demo-topic --dlq-topic=demo-dlq
```

## You can use KafkaConsumerException for business logic or consumer handler logic to send message forcefully in DLQ
```
  use Nirmalsharma\LaravelKafkaPhp\Exceptions\KafkaConsumerException;
  
  throw new KafkaConsumerException('Not valid.');
```

## Environment Variables

To run this, you will need to add the following environment variables to your .env file
Config reference: https://github.com/edenhill/librdkafka/blob/master/CONFIGURATION.md

```
IS_KAFKA_ENABLED=             // Default:  1
KAFKA_BROKERS=
KAFKA_DEBUG=                  // Default: false
KAFKA_SSL_PROTOCOL=           // Default: plaintext
KAFKA_COMPRESSION_TYPE=       // Default: none
KAFKA_IDEMPOTENCE=            // Default: false
KAFKA_CONSUMER_GROUP_ID=      
KAFKA_OFFSET_RESET=           // Default: latest
KAFKA_AUTO_COMMIT=            // Default: true
KAFKA_DEBUG=false
KAFKA_DLQ_TOPIC=
KAFKA_TOPIC=
```


## Authors

- [Nirmal Sharma](https://github.com/nirmalsharmamca)
- [Praveen Menezes](https://github.com/praveenmenezes)


## License

[MIT](https://choosealicense.com/licenses/mit/)



## Features

- Light weight kakfa wrapper
- Easy to produce kafka event and consume in php.

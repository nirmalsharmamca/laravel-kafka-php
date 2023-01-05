<?php
namespace Nirmalsharma\LaravelKafkaPhp;

use Illuminate\Support\ServiceProvider;
use RdKafka\Conf;
use RdKafka\Producer;

class KafkaServiceProvider extends ServiceProvider {

    /**
     * Setup the config.
     *
     * @return void
     */
    protected function setupConfig(): void{
        $source = realpath($raw = __DIR__ . '/../config/kafka.php') ?: $raw;
        $this->mergeConfigFrom($source, 'kafka');
    }

    /**
     * Set the Kafka Configuration.
     *
     * @return \RdKafka\Conf
     */
    private function setupKafkaConf(): Conf{
        # Set Kafka configs
        $kafka_conf = new Conf();
        $kafka_conf->set('security.protocol', config("kafka.ssl_protocol"));
        $kafka_conf->set('compression.type', config("kafka.compression_type"));
        $kafka_conf->set('metadata.broker.list', config("kafka.brokers"));
        $kafka_conf->set('enable.idempotence', config("kafka.idempotence"));

        if (config("kafka.debug")) {
            $kafka_conf->set('log_level', LOG_DEBUG);
            $kafka_conf->set('debug', 'all');
        }

        return $kafka_conf;
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot() {
        $this->setupConfig($this->app);

        $kafka_conf = $this->setupKafkaConf();
        $this->app->bind(Producer::class, function () use ($kafka_conf) {
            return new Producer($kafka_conf);
        });
    }
}

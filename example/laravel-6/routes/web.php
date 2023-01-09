<?php
use Illuminate\Support\Facades\Route;
use App\Classes\KafkaProducerEvent;
use App\Naration;

Route::get('/', function () {
    $faker = Faker\Factory::create();
    
    
    $h = "<h1>Welcome !</h1>";
    for($i=1; $i<=1; $i++){
        $name = $faker->randomNumber(6, true);
        $msg = $faker->word();
        $topic = "multi-parition-test";

        KafkaProducerEvent::publish("usr." . $name, $msg, $topic);
    }
    return $h;
});

<?php

namespace App\Providers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;
use App\Naration;
use App\Observers\NarationObserver;

class EventServiceProvider extends ServiceProvider
{

     /**
     * The model observers for your application.
     *
     * @var array
     */
    // protected $observers = [
    //     Naration::class => [NarationObserver::class],
    // ];

    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();
        Naration::observe(NarationObserver::class);
        //
    }
}

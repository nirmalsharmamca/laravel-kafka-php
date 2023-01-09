<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Naration;
use App\Observers\NarationObserver;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Naration::observe(NarationObserver::class);
    }
}

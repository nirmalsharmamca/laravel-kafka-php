<?php

namespace App\Observers;

use App\Naration;

class NarationObserver
{
    /**
     * Handle the naration "created" event.
     *
     * @param  \App\Naration  $naration
     * @return void
     */
    public function created(Naration $naration)
    {
        // dd(['observer', $naration->toArray()]);
    }

    /**
     * Handle the naration "updated" event.
     *
     * @param  \App\Naration  $naration
     * @return void
     */
    public function updated(Naration $naration)
    {
        //
    }

    /**
     * Handle the naration "deleted" event.
     *
     * @param  \App\Naration  $naration
     * @return void
     */
    public function deleted(Naration $naration)
    {
        //
    }

    /**
     * Handle the naration "restored" event.
     *
     * @param  \App\Naration  $naration
     * @return void
     */
    public function restored(Naration $naration)
    {
        //
    }

    /**
     * Handle the naration "force deleted" event.
     *
     * @param  \App\Naration  $naration
     * @return void
     */
    public function forceDeleted(Naration $naration)
    {
        //
    }
}

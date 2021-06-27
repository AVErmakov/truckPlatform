<?php

namespace App\Observers;

use App\Models\Load;

class LoadObserver
{
    /**
     * Handle the Load "created" event.
     *
     * @param  \App\Models\Load  $load
     * @return void
     */
    public function created()
    {
    }

    /**
     * Handle the Load "updated" event.
     *
     * @param  \App\Models\Load  $load
     * @return void
     */
    public function updated(Load $load)
    {
    }

    /**
     * Handle the Load "saved" event.
     *
     * @param  \App\Models\Load  $load
     * @return void
     */
    public function saved(Load $load)
    {
        echo 'Load---Done!' . PHP_EOL;

    }

    /**
     * Handle the Load "deleted" event.
     *
     * @param  \App\Models\Load  $load
     * @return void
     */
    public function deleted(Load $load)
    {
        //
    }

    /**
     * Handle the Load "restored" event.
     *
     * @param  \App\Models\Load  $load
     * @return void
     */
    public function restored(Load $load)
    {
        //
    }

    /**
     * Handle the Load "force deleted" event.
     *
     * @param  \App\Models\Load  $load
     * @return void
     */
    public function forceDeleted(Load $load)
    {
        //
    }
}

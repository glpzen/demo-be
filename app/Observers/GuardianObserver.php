<?php

namespace App\Observers;

use App\Mail\NewGuardianNotification;
use App\Models\Guardian;
use Illuminate\Support\Facades\Mail;

class GuardianObserver
{
    /**
     * Handle the guardian "created" event.
     *
     * @param  \App\Models\Guardian  $guardian
     * @return void
     */
    public function created(Guardian $guardian)
    {
        Mail::to($guardian->email)->send(new NewGuardianNotification());
    }

    /**
     * Handle the guardian "updated" event.
     *
     * @param  \App\Models\Guardian  $guardian
     * @return void
     */
    public function updated(Guardian $guardian)
    {
        //
    }

    /**
     * Handle the guardian "deleted" event.
     *
     * @param  \App\Models\Guardian  $guardian
     * @return void
     */
    public function deleted(Guardian $guardian)
    {
        //
    }

    /**
     * Handle the guardian "restored" event.
     *
     * @param  \App\Models\Guardian  $guardian
     * @return void
     */
    public function restored(Guardian $guardian)
    {
        //
    }

    /**
     * Handle the guardian "force deleted" event.
     *
     * @param  \App\Models\Guardian  $guardian
     * @return void
     */
    public function forceDeleted(Guardian $guardian)
    {
        //
    }
}

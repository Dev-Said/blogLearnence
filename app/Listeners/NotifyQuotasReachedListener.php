<?php

namespace App\Listeners;

use App\Models\User;
use App\Events\NotifyQuotasReachedEvent;
use Illuminate\Queue\InteractsWithQueue;
use App\Notifications\NotifyQuotasReached;
use Illuminate\Contracts\Queue\ShouldQueue;

class NotifyQuotasReachedListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
   
    }

    /**
     * Handle the event.
     */
    public function handle(NotifyQuotasReachedEvent $event): void
    {
        $admin = User::where('role', 'admin')->first();
        if ($admin && $event->user->quota->fresh()->limitQuotasReached()) {
            $admin->notify(new NotifyQuotasReached($event->user)); 
        }  
    }
}

<?php

namespace App\Listeners;

use App\Events\onRegisterEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Log;

class registerListener
{
	

    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  onRegisterEvent  $event
     * @return void
     */
    public function handle(onRegisterEvent $event)
    {
        Log::info('New user were registered ',$event->new_name);
    }
}

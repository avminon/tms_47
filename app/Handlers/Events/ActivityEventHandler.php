<?php

namespace App\Handlers\Events;

use App\Events\ActivityEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class ActivityEventHandler
{
    /**
     * Create the event listener.
     *
     * @return void
     */

    protected $eventData;

    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  ActivityEvent  $event
     * @return void
     */
    public function handle(ActivityEvent $event)
    {
        $activity = new Activity;
        $activity->create($event->eventData);
    }
}

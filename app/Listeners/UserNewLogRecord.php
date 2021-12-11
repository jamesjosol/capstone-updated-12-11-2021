<?php

namespace App\Listeners;

use App\Events\UserLog;
use App\Models\Log;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class UserNewLogRecord
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
     * @param  object  $event
     * @return void
     */
    public function handle(UserLog $event)
    {
        Log::create([
            'user_id'       => auth()->user()->id,
            'log_entry'     => $event->log,
        ]);
    }
}

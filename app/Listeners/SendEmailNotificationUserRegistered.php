<?php

namespace App\Listeners;

use Mail;
use App\Mail\UserRegistedrMail;
use App\Events\UserRegisteredEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendEmailNotificationUserRegistered implements ShouldQueue
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
     * @param  UserRegisteredEvent  $event
     * @return void
     */
    public function handle(UserRegisteredEvent $event)
    {
        Mail::to($event->user)->send(new UserRegistedrMail($event->user));
    }
}

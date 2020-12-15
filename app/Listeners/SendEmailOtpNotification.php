<?php

namespace App\Listeners;

use Mail;
use App\Mail\UserOtpMail;
use App\Events\UserRegisteredEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendEmailOtpNotification
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
        Mail::to($user_email)->send(new UserOtpMail($otp));
    }
}

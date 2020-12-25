<?php

namespace App\Listeners;

use App\Mail\SendOtpCodeMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Mail;

use function PHPSTORM_META\map;

class SendEmailOtpCode implements ShouldQueue
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
    public function handle($event)
    {
        if ($event->condition == 'register'){
            $pesan = "Were excited to have get started. first, you need to confir our account";
        }
        elseif ($event->condition == 'regenerate'){
            $pesan = "Regenerate OTP succesfull. This is your OTP Code:";
        }

        Mail::to($event->user)->send(new SendOtpCodeMail($event->user, $pesan));
    }
}

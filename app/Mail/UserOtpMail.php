<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\OtpCode;
use App\Otp;

class UserOtpMail extends Mailable
{
    use Queueable, SerializesModels;
    protected $otp;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Otp $otp)
    {
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('example@example.com')
        ->view('send_otp_user_registered')
        ->with([
                'otp' => $this->otp->otp,
        ]);
    }
}

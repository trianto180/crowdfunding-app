<?php

namespace App\Http\Controllers\Auth;

use App\Events\UserRegisteredEvent;
use Mail;
use App\User;
use App\Mail\UserOtpMail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RegenerateOtpCodeController extends Controller
{
    public function __invoke(Request $request)
    {
        $request->validate([
            'email' => 'required',
        ]);

        $user_email = User::where ('email' , $request->email)->first();
        $otp = Otp::where('user_id',$user_email->id)->first();
        if (!$user_email) {
            return response()->json([
                'response_code' => '01',
                'response_message' => 'Email tidak ditemukan'
            ], 401);
        } else {
        $user_email->generate_otp_code();
        
        event(new UserRegisteredEvent($otp));

        return response()->json([
            'response_code' => '00',
            'response_message' => 'Kode Otp berhasil di generate, silahkan di cek kembali ke akun email anda '
        ], 200);
        }
    }
}

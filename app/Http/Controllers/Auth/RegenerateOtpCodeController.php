<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Illuminate\Http\Request;
use App\Events\UserRegistered;
use App\Http\Controllers\Controller;

class RegenerateOtpCodeController extends Controller
{
    public function __invoke(Request $request)
    {
        $request->validate([
            'email' => 'required',
        ]);

        $user = User::where('email' , $request->email)->first();
        
        $user->generate_otp_code();
        
        event(new UserRegistered($user, 'regenerate'));

        $data['user'] = $user;

        return response()->json([
            'response_code' => '00',
            'response_message' => 'Kode Otp berhasil di generate, silahkan di cek kembali ke akun email anda ',
            'data' => $data
        ]);
        }
}

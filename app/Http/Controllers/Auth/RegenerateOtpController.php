<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\OtpCode;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegenerateOtpController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $otp = OtpCode::all()->first();
        $request->replace(['otp' => rand(000000, 999999)]);

        $user = User::all()->first();

        return response()->json([
            'response_code' => '00',
            'response_message' => 'Otop berhasil dikirim',
            'data' => $user
        ]);
    }
}
<?php

namespace App\Http\Controllers\Auth;

use App\OtpCode;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Symfony\Component\HttpFoundation\Request;
use Illuminate\Foundation\Auth\VerifiesEmails;

class VerificationController extends Controller
{
    public function __invoke(Request $request)
    {
        $otp = OtpCode::where('otp', $request->otp)->first();

        if (!$otp) {
            return response()->json([
                'response_code' => '01',
                'response_message' => 'Otp salah',
            ]);
        } 

        $now = Carbon::now();

        if($now > $otp->valid_until){
            return response()->json([
                'response_code' => '01',
                'response_message' => 'Kode OTP sudah kadaluwarsa'
            ]);
        }

        return response()->json([
            'response_code' => '00',
            'response_message' => 'Kode OTP berhasil diverifikasi'
        ]);
    }
}
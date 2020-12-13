<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\OtpCode;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    public function __invoke(Request $request)
    {
        request()->validate([
            'name' => 'required',
            'email' => ['required', 'unique:users,email'],
            'password' => 'required',
        ]);
        $user = User::create([
            'name' => request('name'),
            'email' => request('email'),
            'password' => Hash::make($request->password),
            'otp_code' => rand(000000, 999999),
        ]);

        $otp = OtpCode::create([
            'otp' => $user->otp_code,
            'user_id' => $user->id,
            'valid_until' => now(),
        ]);

        $user = User::all()->first();

        return response()->json([
            'response_code' => '00',
            'response_message' => 'Anda berhasil mendaftar. silahkan cek email!',
            'data' => $user
        ]);
    }
}

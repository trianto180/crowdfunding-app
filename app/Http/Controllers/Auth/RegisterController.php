<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Illuminate\Http\Request;
use App\Events\UserRegisteredEvent;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;

class RegisterController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(RegisterRequest $request)
    {
        $data  = [];

        $user = User::create([
            'name' => request('name'),
            'no_hp' => request('no_hp'),
            'email' => request('email'),
            'password' => bcrypt(request('password')),
        ]);

        $data['user'] = $user;

        event(new UserRegisteredEvent($user));

        return response()->json([
            'response_code' => '00',
            'response_message' => 'user baru berhasil didaftarkan, silahkan cek email untuk melihat kode otp',
            'data' => $data
        ], 200);
    }
}

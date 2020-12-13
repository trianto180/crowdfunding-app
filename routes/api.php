<?php

Route::namespace('Auth')->group(function(){
    Route::post('register', 'RegisterController');
    Route::post('login', 'LoginController');
    Route::post('verification', 'VerificationController');
    Route::post('regenerate_otp', 'RegenerateOtpController');
});
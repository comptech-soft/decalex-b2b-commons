<?php

use Illuminate\Support\Facades\Route;

Route::middleware(['is-unauthenticated'])->namespace(\System\Http\Controllers::class)->group(function(){

    Route::get('login', 'LoginController@index');
    Route::post('login', 'LoginController@login');

    // Route::get('register', 'UsersController@registerIndex');
    // Route::post('register', 'UsersController@register');

    // Route::get('activate-account/{code}', 'UsersController@activateAccountIndex');
    // Route::post('activate-account', 'UsersController@activateAccount');

    Route::get('forgot-password', 'ForgotPasswordController@index');
    Route::post('forgot-password', 'ForgotPasswordController@forgotPassword');

    Route::get('reset-password/{code}', 'ResetPasswordController@index');
    Route::post('reset-password', 'ResetPasswordController@resetPassword');
});
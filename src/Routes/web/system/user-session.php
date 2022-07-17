<?php

use B2B\Http\Controllers\System;

Route::middleware(['is-unauthenticated'])->namespace(System::class)->group(function(){

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

Route::middleware(['is-authenticated'])->namespace(System::class)->group(function(){

    // Route::get('my-profile', 'UsersController@myProfileIndex');

    // Route::post('my-profile/save-generals', 'UsersController@saveGenerals');
    // Route::post('my-profile/change-password', 'UsersController@changePassword');
    // Route::post('my-profile/save-avatar', 'UsersController@saveAvatar');

    Route::post('logout', 'LogoutController@logout');

});
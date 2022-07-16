<?php

/** USERS  **/
Route::middleware(['is-authenticated'])->prefix('users')->namespace(\Cartalyst\Http\Controllers::class)->group(function(){


    Route::post('action/{action}', 'UsersController@doAction');
    Route::post('get-user-by-id', 'UsersController@getUserById');
    Route::post('items', 'UsersController@getItems');

    Route::post('change-password', 'UsersController@changePassword');
    Route::post('change-avatar', 'UsersController@changeAvatar');
    Route::post('save-email-signature', 'UsersController@saveEmailSignature');
    

});

Route::middleware(['is-authenticated'])->namespace(\Cartalyst\Http\Controllers::class)->group(function(){

    Route::get('my-profile', 'MyProfileController@index');

});
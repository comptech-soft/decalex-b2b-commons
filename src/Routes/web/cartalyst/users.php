<?php

use B2B\Http\Controllers\Cartalyst;

/** USERS  **/
Route::middleware(['is-authenticated'])->prefix('users')->namespace(Cartalyst::class)->group(function(){

    Route::post('action/{action}', 'UsersController@doAction');
    Route::post('get-user-by-id', 'UsersController@getUserById');
    Route::post('items', 'UsersController@getItems');

    Route::post('change-password', 'UsersController@changePassword');
    Route::post('change-avatar', 'UsersController@changeAvatar');
    
    Route::post('save-email-signature', 'UsersController@saveEmailSignature');
    Route::post('save-dashboard', 'UsersController@saveDashboard');
    
});

Route::middleware(['is-authenticated'])->namespace(Cartalyst::class)->group(function(){

    Route::get('my-profile', 'MyProfileController@index');

});
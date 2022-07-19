<?php

use B2B\Http\Controllers\Client;


Route::middleware(['is-authenticated'])->prefix('customers-notifications')->namespace(Client::class)->group(function(){
    Route::post('items', 'NotificationsController@getItems');
    Route::post('action/{action}', 'NotificationsController@doAction');
});

Route::middleware(['is-authenticated'])->prefix('notificarile-mele')->namespace(Client::class)->group(function(){
    Route::get('/', 'MyNotificationsController@index');
});
<?php

use B2B\Http\Controllers\Decalex;

/** NOTIFICATIONS **/
Route::middleware(['is-authenticated'])->prefix('notifications')->namespace(Decalex::class)->group(function(){
    
    Route::get('/', 'NotificationsController@index'); 
    Route::post('items', 'NotificationsController@getItems');
    Route::post('action/{action}', 'NotificationsController@doAction');

});


Route::middleware(['is-authenticated'])->prefix('notificarile-mele')->namespace(Decalex::class)->group(function(){
    Route::get('/', 'MyNotificationsController@index');
});

Route::middleware(['is-authenticated'])->prefix('customers-notifications')->namespace(Decalex::class)->group(function(){
    Route::post('items', 'CustomersNotificationsController@getItems');
    Route::post('action/{action}', 'CustomersNotificationsController@doAction');
});


<?php

/** 
 * NOTIFICATIONS
 **/
Route::middleware(['is-authenticated'])->prefix('notifications')->namespace(\Decalex\Http\Controllers::class)->group(function(){
    
    Route::get('/', 'NotificationsController@index'); 
    Route::post('items', 'NotificationsController@getItems');
    Route::post('action/{action}', 'NotificationsController@doAction');

});


Route::middleware(['is-authenticated'])->prefix('notificarile-mele')->namespace(\Decalex\Http\Controllers::class)->group(function(){
    Route::get('/', 'MyNotificationsController@index');
});

Route::middleware(['is-authenticated'])->prefix('customers-notifications')->namespace(\Decalex\Http\Controllers::class)->group(function(){
    Route::post('items', 'CustomersNotificationsController@getItems');
    Route::post('action/{action}', 'CustomersNotificationsController@doAction');
});


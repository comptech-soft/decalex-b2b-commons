<?php

/** NOTIFICATIONS **/
Route::middleware(['is-authenticated'])->prefix('notifications')->namespace(\B2B\Http\Controllers\Decalex::class)->group(function(){
    
    Route::get('/', 'NotificationsController@index'); 
    Route::post('items', 'NotificationsController@getItems');
    Route::post('action/{action}', 'NotificationsController@doAction');

});


Route::middleware(['is-authenticated'])->prefix('notificarile-mele')->namespace(\B2B\Http\Controllers\Decalex::class)->group(function(){
    Route::get('/', 'MyNotificationsController@index');
});

Route::middleware(['is-authenticated'])->prefix('customers-notifications')->namespace(\B2B\Http\Controllers\Decalex::class)->group(function(){
    Route::post('items', 'CustomersNotificationsController@getItems');
    Route::post('action/{action}', 'CustomersNotificationsController@doAction');
});


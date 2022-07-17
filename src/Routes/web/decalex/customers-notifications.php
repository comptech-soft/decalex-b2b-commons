<?php

Route::middleware(['is-authenticated'])->prefix('customers-notifications')->namespace(\Decalex\Http\Controllers::class)->group(function(){

    Route::post('items', 'CustomersNotificationsController@getItems');
    
});
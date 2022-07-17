<?php

Route::middleware(['is-authenticated'])->prefix('customers-notifications')->namespace(\B2B\Http\Controllers\Decalex::class)->group(function(){

    Route::post('items', 'CustomersNotificationsController@getItems');
    
});
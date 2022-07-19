<?php

use B2B\Http\Controllers\Decalex;

Route::middleware(['is-authenticated'])->prefix('customers-notifications')->namespace(Decalex::class)->group(function(){

    Route::post('items', 'CustomersNotificationsController@getItems');
    
});
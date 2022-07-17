<?php

Route::middleware(['is-authenticated'])->prefix('customers-departamente')->namespace(\B2B\Http\Controllers\Decalex::class)->group(function(){

    Route::post('items', 'CustomersDepartamenteController@getItems');
    Route::post('action/{action}', 'CustomersDepartamenteController@doAction');

});

<?php

use B2B\Http\Controllers\Decalex;

Route::middleware(['is-authenticated'])->prefix('customers-chestionare')->namespace(Decalex::class)->group(function(){

    Route::get('/', 'CustomersChestionareController@index');
    
    Route::post('items', 'CustomersChestionareController@getItems');

    Route::post('get-summaries', 'CustomersChestionareController@getSummaries');

});

Route::middleware(['is-authenticated'])->prefix('customers-chestionar-raspunsuri')->namespace(Decalex::class)->group(function(){

    Route::post('items', 'ChestionarRaspunsuriController@getItems');

});
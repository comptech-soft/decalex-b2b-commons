<?php

Route::middleware(['is-authenticated'])->prefix('customers-chestionare')->namespace(\B2B\Http\Controllers\Decalex::class)->group(function(){

    Route::post('items', 'CustomersChestionareController@getItems');

});

Route::middleware(['is-authenticated'])->prefix('customers-chestionar-raspunsuri')->namespace(\B2B\Http\Controllers\Decalex::class)->group(function(){

    Route::post('items', 'ChestionarRaspunsuriController@getItems');

});
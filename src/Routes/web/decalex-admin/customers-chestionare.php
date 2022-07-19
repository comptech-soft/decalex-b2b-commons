<?php

use B2B\Http\Controllers\Decalex;

Route::middleware(['is-authenticated'])->prefix('customers-chestionare')->namespace(Decalex::class)->group(function(){

    Route::post('items', 'CustomersChestionareController@getItems');

});

Route::middleware(['is-authenticated'])->prefix('customers-chestionar-raspunsuri')->namespace(Decalex::class)->group(function(){

    Route::post('items', 'ChestionarRaspunsuriController@getItems');

});
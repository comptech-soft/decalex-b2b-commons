<?php

Route::middleware(['is-authenticated'])->prefix('customers-chestionare')->namespace(\Decalex\Http\Controllers::class)->group(function(){
    Route::post('items', 'CustomersChestionareController@getItems');
});

Route::middleware(['is-authenticated'])->prefix('customers-chestionar-raspunsuri')->namespace(\Decalex\Http\Controllers::class)->group(function(){
    Route::post('items', 'ChestionarRaspunsuriController@getItems');
});
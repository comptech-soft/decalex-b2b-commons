<?php

Route::middleware(['is-authenticated'])->prefix('customers-centralizatoare')->namespace(\Decalex\Http\Controllers::class)->group(function(){
    Route::post('items', 'CustomersCentralizatoareController@getItems');
});

// Route::middleware(['is-authenticated'])->prefix('customers-chestionar-raspunsuri')->namespace(\Decalex\Http\Controllers::class)->group(function(){
//     Route::post('items', 'ChestionarRaspunsuriController@getItems');
// });
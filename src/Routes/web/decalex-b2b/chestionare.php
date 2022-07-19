<?php

use B2B\Http\Controllers\Client;

Route::middleware(['is-authenticated'])->prefix('chestionare')->namespace(Client::class)->group(function(){
    Route::get('/', 'ChestionareController@index'); 
    Route::post('items', 'ChestionareController@getItems');
});


/** CHESTIONAR **/
Route::middleware(['pre-authenticate'])->prefix('chestionar')->namespace(Client::class)->group(function(){
    Route::get('raspunde/{id}', 'ChestionarController@index');
    Route::post('save-raspuns', 'ChestionarController@saveRaspuns');
    Route::post('finalizare', 'ChestionarController@finalizare');
});

Route::middleware(['is-authenticated'])->prefix('chestionare-intrebari')->namespace(Client::class)->group(function(){
    Route::post('items', 'ChestionareIntrebariController@getItems');
});

Route::middleware(['is-authenticated'])->prefix('chestionar-raspunsuri')->namespace(Client::class)->group(function(){
    Route::post('items', 'ChestionarRaspunsuriController@getItems');
});

Route::middleware(['is-authenticated'])->prefix('intrebari')->namespace(Client::class)->group(function(){
    Route::post('items', 'IntrebariController@getItems');
});

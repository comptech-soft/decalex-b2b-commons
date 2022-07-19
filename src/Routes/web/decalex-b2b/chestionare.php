<?php

Route::middleware(['is-authenticated'])->prefix('chestionare')->namespace(\Decalex\Http\Controllers::class)->group(function(){
    Route::get('/', 'ChestionareController@index'); 
    Route::post('items', 'ChestionareController@getItems');
});


/** CHESTIONAR **/
Route::middleware(['pre-authenticate'])->prefix('chestionar')->namespace(\Decalex\Http\Controllers::class)->group(function(){
    Route::get('raspunde/{id}', 'ChestionarController@index');
    Route::post('save-raspuns', 'ChestionarController@saveRaspuns');
    Route::post('finalizare', 'ChestionarController@finalizare');
});

Route::middleware(['is-authenticated'])->prefix('chestionare-intrebari')->namespace(\Decalex\Http\Controllers::class)->group(function(){
    Route::post('items', 'ChestionareIntrebariController@getItems');
});

Route::middleware(['is-authenticated'])->prefix('chestionar-raspunsuri')->namespace(\Decalex\Http\Controllers::class)->group(function(){
    Route::post('items', 'ChestionarRaspunsuriController@getItems');
});

Route::middleware(['is-authenticated'])->prefix('intrebari')->namespace(\Decalex\Http\Controllers::class)->group(function(){
    Route::post('items', 'IntrebariController@getItems');
});

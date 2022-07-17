<?php

Route::middleware(['is-authenticated'])->prefix('customers-cursuri')->namespace(\Decalex\Http\Controllers::class)->group(function(){

    Route::get('/', 'CustomersCursuriController@index'); 
    Route::post('items', 'CustomersCursuriController@getItems');

});


Route::middleware(['is-authenticated'])->prefix('customers-cursuri-participanti')->namespace(\Decalex\Http\Controllers::class)->group(function(){

    Route::post('action/{action}', 'CustomersCursuriParticipantiController@doAction');

});
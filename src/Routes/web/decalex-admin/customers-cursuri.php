<?php

use B2B\Http\Controllers\Decalex;

Route::middleware(['is-authenticated'])->prefix('customers-cursuri')->namespace(Decalex::class)->group(function(){

    Route::get('/', 'CustomersCursuriController@index'); 

    Route::post('items', 'CustomersCursuriController@getItems');

    Route::post('get-summaries', 'CustomersCursuriController@getSummaries');

});


Route::middleware(['is-authenticated'])->prefix('customers-cursuri-participanti')->namespace(Decalex::class)->group(function(){

    Route::post('action/{action}', 'CustomersCursuriParticipantiController@doAction');

});
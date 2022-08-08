<?php

use B2B\Http\Controllers\Decalex;

Route::middleware(['is-authenticated'])->prefix('customers-centralizatoare')->namespace(Decalex::class)->group(function(){

    Route::get('/', 'CustomersCentralizatoareController@index'); 

    Route::post('items', 'CustomersCentralizatoareController@getItems');

    Route::post('get-summaries', 'CustomersCentralizatoareController@getSummaries');

});

Route::middleware(['is-authenticated'])->prefix('centralizator-raspunsuri')->namespace(Decalex::class)->group(function(){
    
    Route::post('items', 'CentralizatorRaspunsuriController@getItems');
    Route::post('action/{action}', 'CentralizatorRaspunsuriController@doAction');
});


<?php

use B2B\Http\Controllers\Client;

Route::middleware(['is-authenticated'])->prefix('centralizatoare')->namespace(Client::class)->group(function(){
    Route::get('/', 'CentralizatoareController@index'); 
    Route::post('items', 'CentralizatoareController@getItems');
});

Route::middleware(['is-authenticated'])->prefix('centralizator-raspunsuri')->namespace(Client::class)->group(function(){
    
    Route::post('items', 'CentralizatorRaspunsuriController@getItems');
    Route::post('action/{action}', 'CentralizatorRaspunsuriController@doAction');
});

<?php

use B2B\Http\Controllers\Client;

/** 
 * CONTRACTE SI COMENZI
 **/
Route::middleware(['is-authenticated'])->prefix('contracte')->namespace(Client::class)->group(function(){
    
    Route::get('/', 'ContractsController@index');
    Route::post('items', 'ContractsController@getItems');
    Route::post('action/{action}', 'ContractsController@doAction');

});


Route::middleware(['is-authenticated'])->prefix('comenzi')->namespace(Client::class)->group(function(){
    
    Route::post('items', 'OrdersController@getItems');

    
});
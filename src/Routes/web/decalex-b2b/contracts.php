<?php

/** 
 * CONTRACTE SI COMENZI
 **/
Route::middleware(['is-authenticated'])->prefix('contracte')->namespace(\Decalex\Http\Controllers::class)->group(function(){
    
    Route::get('/', 'ContractsController@index');
    Route::post('items', 'ContractsController@getItems');
    Route::post('action/{action}', 'ContractsController@doAction');

});


Route::middleware(['is-authenticated'])->prefix('comenzi')->namespace(\Decalex\Http\Controllers::class)->group(function(){
    
    Route::post('items', 'OrdersController@getItems');

    
});
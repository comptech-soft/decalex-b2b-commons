<?php

use B2B\Http\Controllers\Decalex;

/** CONTRACTS **/
Route::middleware(['is-authenticated'])->prefix('customers-contracts')->namespace(Decalex::class)->group(function(){
    
    Route::get('/', 'ContractsController@index'); //->middleware(['has-permission:roles']);
    Route::post('items', 'ContractsController@getItems');
    Route::post('action/{action}', 'ContractsController@doAction');
    Route::post('export', 'ContractsController@export');

    Route::get('export-preview', 'ContractsController@exportPreview');
});

Route::middleware(['is-authenticated'])->prefix('customers-comenzi')->namespace(Decalex::class)->group(function(){
    
    Route::post('items', 'OrdersController@getItems');

    
});

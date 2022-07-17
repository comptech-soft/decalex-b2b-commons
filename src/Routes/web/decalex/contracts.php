<?php

/** CONTRACTS **/
Route::middleware(['is-authenticated'])->prefix('contracts')->namespace(\Decalex\Http\Controllers::class)->group(function(){
    
    Route::get('/', 'ContractsController@index'); //->middleware(['has-permission:roles']);
    Route::post('items', 'ContractsController@getItems');
    Route::post('action/{action}', 'ContractsController@doAction');
    Route::post('export', 'ContractsController@export');

    Route::get('export-preview', 'ContractsController@exportPreview');
});

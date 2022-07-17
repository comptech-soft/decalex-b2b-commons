<?php

/** 
 * REGISTRE. Ce registre sunt in aplicatie
 **/
Route::middleware(['is-authenticated'])->prefix('registre')->namespace(\Decalex\Http\Controllers::class)->group(function(){
    
    Route::get('/', 'RegistreController@index'); 
    Route::post('items', 'RegistreController@getItems');
    Route::post('action/{action}', 'RegistreController@doAction');

    Route::post('add-group', 'RegistreController@addGroup');
    Route::post('add-column', 'RegistreController@addColumn');

    Route::post('export', 'RegistreController@export');
    Route::get('export-preview/{id}', 'RegistreController@exportPreview');

    Route::post('xls-import', 'RegistreController@xlsImport');

    Route::post('copy-to-customer', 'RegistreController@copyToCustomer');
});

/** 
 * REGISTRE. Coloanele asociate la un registru
 **/
Route::middleware(['is-authenticated'])->prefix('registre-coloane')->namespace(\Decalex\Http\Controllers::class)->group(function(){
    
    Route::post('items', 'RegistreColoaneController@getItems');
    Route::post('action/{action}', 'RegistreColoaneController@doAction');
    Route::post('reorder', 'RegistreColoaneController@reorder');

});


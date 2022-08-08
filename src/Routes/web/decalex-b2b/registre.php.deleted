<?php

use B2B\Http\Controllers\Client;

Route::middleware(['is-authenticated'])->prefix('registre')->namespace(Client::class)->group(function(){
    Route::get('{slug}', 'RegisterController@index'); 
    // Route::post('items', 'CentralizatoareController@getItems');
});

/** REGISTRELE CLIENTILOR **/
Route::middleware(['is-authenticated'])->prefix('customers-registers')->namespace(Client::class)->group(function(){    
    Route::post('items', 'CustomersRegistersController@getItems');
    Route::post('action/{action}', 'CustomersRegistersController@doAction');
    Route::post('export', 'CustomersRegistersController@export');
    Route::post('xls-import', 'CustomersRegistersController@xlsImport');
});


Route::middleware(['is-authenticated'])->prefix('customers-registers-rows')->namespace(Client::class)->group(function(){
    Route::post('items', 'CustomersRegistersRowsController@getItems');
    Route::post('change-status', 'CustomersRegistersRowsController@changeStatus');
    Route::post('action/{action}', 'CustomersRegistersRowsController@doAction');
});

/** 
 * REGISTRE. Coloanele asociate la la un registru
 **/
Route::middleware(['is-authenticated'])->prefix('registre-coloane')->namespace(Client::class)->group(function(){
    
    Route::post('items', 'RegistreColoaneController@getItems');
    Route::post('action/{action}', 'RegistreColoaneController@doAction');
    Route::post('reorder', 'RegistreColoaneController@reorder');

});


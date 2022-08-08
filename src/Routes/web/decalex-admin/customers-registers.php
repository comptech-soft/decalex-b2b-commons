<?php

use B2B\Http\Controllers\Decalex;

/** REGISTRELE CLIENTILOR **/
Route::middleware(['is-authenticated'])->prefix('customers-registers')->namespace(Decalex::class)->group(function(){ 

    Route::get('{slug}', 'CustomersRegistersController@index'); 

    Route::post('items', 'CustomersRegistersController@getItems');

    Route::post('action/{action}', 'CustomersRegistersController@doAction');

    Route::post('get-summaries', 'CustomersRegistersController@getSummaries');
});


Route::middleware(['is-authenticated'])->prefix('customers-registers-rows')->namespace(Decalex::class)->group(function(){

    Route::post('items', 'CustomersRegistersRowsController@getItems');
    
    Route::post('change-status', 'CustomersRegistersRowsController@changeStatus');
    
    Route::post('action/{action}', 'CustomersRegistersRowsController@doAction');
    
});



// /** REGISTRELE CLIENTILOR **/
// Route::middleware(['is-authenticated'])->prefix('customers-registers')->namespace(Client::class)->group(function(){    
//     Route::post('items', 'CustomersRegistersController@getItems');
//     Route::post('action/{action}', 'CustomersRegistersController@doAction');
//     Route::post('export', 'CustomersRegistersController@export');
//     Route::post('xls-import', 'CustomersRegistersController@xlsImport');
// });


// Route::middleware(['is-authenticated'])->prefix('customers-registers-rows')->namespace(Client::class)->group(function(){
//     Route::post('items', 'CustomersRegistersRowsController@getItems');
//     Route::post('change-status', 'CustomersRegistersRowsController@changeStatus');
//     Route::post('action/{action}', 'CustomersRegistersRowsController@doAction');
// });
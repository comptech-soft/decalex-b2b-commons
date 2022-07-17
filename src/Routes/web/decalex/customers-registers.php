<?php

/** REGISTRELE CLIENTILOR **/
Route::middleware(['is-authenticated'])->prefix('customers-registers')->namespace(\B2B\Http\Controllers\Decalex::class)->group(function(){ 

    Route::post('items', 'CustomersRegistersController@getItems');
    Route::post('action/{action}', 'CustomersRegistersController@doAction');

});


Route::middleware(['is-authenticated'])->prefix('customers-registers-rows')->namespace(\B2B\Http\Controllers\Decalex::class)->group(function(){

    Route::post('items', 'CustomersRegistersRowsController@getItems');
    Route::post('change-status', 'CustomersRegistersRowsController@changeStatus');
    Route::post('action/{action}', 'CustomersRegistersRowsController@doAction');
    
});


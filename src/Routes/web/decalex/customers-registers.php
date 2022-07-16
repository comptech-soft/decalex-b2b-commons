<?php

/** REGISTRELE CLIENTILOR **/
Route::middleware(['is-authenticated'])->prefix('customers-registers')->namespace(\Decalex\Http\Controllers::class)->group(function(){    
    Route::post('items', 'CustomersRegistersController@getItems');
    Route::post('action/{action}', 'CustomersRegistersController@doAction');
});


Route::middleware(['is-authenticated'])->prefix('customers-registers-rows')->namespace(\Decalex\Http\Controllers::class)->group(function(){
    Route::post('items', 'CustomersRegistersRowsController@getItems');
    Route::post('change-status', 'CustomersRegistersRowsController@changeStatus');
    Route::post('action/{action}', 'CustomersRegistersRowsController@doAction');
});


<?php

use B2B\Http\Controllers\Decalex;

/** ORDERS **/
Route::middleware(['is-authenticated'])->prefix('customers-orders')->namespace(Decalex::class)->group(function(){
    
    Route::get('/', 'OrdersController@index'); //->middleware(['has-permission:roles']);
    Route::post('items', 'OrdersController@getItems');
    Route::post('action/{action}', 'OrdersController@doAction');
    Route::post('export', 'OrdersController@export');

    Route::get('export-preview', 'OrdersController@exportPreview');
});

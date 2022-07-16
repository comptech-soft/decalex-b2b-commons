<?php

/** 
 * ORDERS
 **/
Route::middleware(['is-authenticated'])->prefix('orders')->namespace(\Decalex\Http\Controllers::class)->group(function(){
    
    Route::get('/', 'OrdersController@index'); //->middleware(['has-permission:roles']);
    Route::post('items', 'OrdersController@getItems');
    Route::post('action/{action}', 'OrdersController@doAction');
    Route::post('export', 'OrdersController@export');

    Route::get('export-preview', 'OrdersController@exportPreview');
});

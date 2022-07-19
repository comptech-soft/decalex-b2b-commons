<?php

/** 
 * CUSTOMERS
 **/
Route::middleware(['is-authenticated'])->prefix('customers')->namespace(\Decalex\Http\Controllers::class)->group(function(){
    
    Route::get('/', 'CustomersController@index');
    Route::post('items', 'CustomersController@getItems');
    Route::post('customer', 'CustomersController@getCustomer');
    Route::post('customer/statistics', 'CustomersController@getCustomerStatistics');
    Route::post('action/{action}', 'CustomersController@doAction');
    Route::post('export', 'CustomersController@Export');
    Route::get('export-preview', 'CustomersController@exportPreview');
});

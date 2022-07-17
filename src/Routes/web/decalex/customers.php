<?php

/** CUSTOMERS **/
Route::middleware(['is-authenticated'])->prefix('customers')->namespace(\Decalex\Http\Controllers::class)->group(function(){
    
    Route::get('/', 'CustomersController@index'); //->middleware(['has-permission:roles']);

    Route::post('items', 'CustomersController@getItems');
    Route::post('customer', 'CustomersController@getCustomer');
    Route::post('customer/statistics', 'CustomersController@getCustomerStatistics');

    /** Serviciile din comenzile/contractele active ale unui clienti */
    Route::post('get-active-services', 'CustomersController@getActiveServices');
      
    Route::post('action/{action}', 'CustomersController@doAction');
    
    Route::post('export', 'CustomersController@Export');
    Route::get('export-preview', 'CustomersController@exportPreview');

    Route::post('xls-import', 'CustomersController@xlsImport');
    
});

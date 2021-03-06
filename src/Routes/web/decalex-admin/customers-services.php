<?php

use B2B\Http\Controllers\Decalex;

/** CUSTOMERS SERVICES. Ce servicii exista in orders - contracts - customers **/
Route::middleware(['is-authenticated'])->prefix('customers-services')->namespace(Decalex::class)->group(function(){
    
    Route::get('/', 'CustomersServicesController@index'); //->middleware(['has-permission:roles']);

    Route::post('items', 'CustomersServicesController@getItems');
    Route::post('action/{action}', 'CustomersServicesController@doAction');

    Route::post('export', 'CustomersServicesController@export');
    Route::get('export-preview', 'CustomersServicesController@exportPreview');

});

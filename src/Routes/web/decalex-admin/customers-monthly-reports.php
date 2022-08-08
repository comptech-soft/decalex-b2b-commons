<?php

use B2B\Http\Controllers\Decalex;

/** Rapoarte lunare **/
Route::middleware(['is-authenticated'])->prefix('customers-monthly-reports')->namespace(Decalex::class)->group(function(){
    
    Route::get('/', 'CustomersMonthlyReportsController@index'); 
    // Route::post('items', 'PersonsController@getItems');
    // Route::post('action/{action}', 'PersonsController@doAction');
    // Route::post('export', 'PersonsController@export');

    // Route::get('export-preview', 'PersonsController@exportPreview');
});

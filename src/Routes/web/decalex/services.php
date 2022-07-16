<?php

/** 
 * CUSTOMERS
 **/
Route::middleware(['is-authenticated'])->prefix('services')->namespace(\Decalex\Http\Controllers::class)->group(function(){
    
    Route::get('/', 'ServicesController@index'); //->middleware(['has-permission:roles']);
    Route::post('items', 'ServicesController@getItems');
    Route::post('action/{action}', 'ServicesController@doAction');
    Route::post('reorder', 'ServicesController@reorderServices');
    Route::post('export', 'ServicesController@export');

    Route::get('export-preview', 'ServicesController@exportPreview');

});

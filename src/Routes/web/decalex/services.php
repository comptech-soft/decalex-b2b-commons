<?php

/** SERVICES **/
Route::middleware(['is-authenticated'])->prefix('services')->namespace(\B2B\Http\Controllers\Decalex::class)->group(function(){
    
    Route::get('/', 'ServicesController@index'); //->middleware(['has-permission:roles']);
    Route::post('items', 'ServicesController@getItems');
    Route::post('action/{action}', 'ServicesController@doAction');
    Route::post('reorder', 'ServicesController@reorderServices');
    Route::post('export', 'ServicesController@export');

    Route::get('export-preview', 'ServicesController@exportPreview');

});

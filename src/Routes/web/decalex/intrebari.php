<?php

/** 
 * COLECTIA DE INTREBARI
 **/
Route::middleware(['is-authenticated'])->prefix('intrebari')->namespace(\Decalex\Http\Controllers::class)->group(function(){
    
    Route::get('/', 'IntrebariController@index'); //->middleware(['has-permission:roles']);
    Route::post('items', 'IntrebariController@getItems');
    Route::post('action/{action}', 'IntrebariController@doAction');
    // Route::post('reorder', 'ServicesController@reorderServices');
    // Route::post('export', 'ServicesController@export');

    // Route::get('export-preview', 'ServicesController@exportPreview');

});

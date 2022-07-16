<?php

/** 
 * CHESTIONARE INTREBARI
 **/
Route::middleware(['is-authenticated'])->prefix('chestionare-intrebari')->namespace(\Decalex\Http\Controllers::class)->group(function(){
    
    Route::get('/', 'ChestionareIntrebariController@index'); //->middleware(['has-permission:roles']);
    Route::post('items', 'ChestionareIntrebariController@getItems');
    Route::post('action/{action}', 'ChestionareIntrebariController@doAction');
    // Route::post('reorder', 'ServicesController@reorderServices');
    // Route::post('export', 'ServicesController@export');

    // Route::get('export-preview', 'ServicesController@exportPreview');

});

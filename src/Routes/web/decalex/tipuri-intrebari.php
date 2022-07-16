<?php

/** 
 * TIPURI INTREBARI
 **/
Route::middleware(['is-authenticated'])->prefix('tipuri-intrebari')->namespace(\Decalex\Http\Controllers::class)->group(function(){
    
    Route::get('/', 'TipuriIntrebariController@index'); 
    Route::post('items', 'TipuriIntrebariController@getItems');
    Route::post('action/{action}', 'TipuriIntrebariController@doAction');
    Route::post('reorder', 'TipuriIntrebariController@reorderRecords');
    // Route::post('export', 'ServicesController@export');

    // Route::get('export-preview', 'ServicesController@exportPreview');

});

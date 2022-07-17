<?php

/** 
 * TIPURI INTREBARI
 **/
Route::middleware(['is-authenticated'])->prefix('tipuri-intrebari')->namespace(\Decalex\Http\Controllers::class)->group(function(){
    
    Route::get('/', 'TipuriIntrebariController@index'); 
    Route::post('items', 'TipuriIntrebariController@getItems');
    Route::post('action/{action}', 'TipuriIntrebariController@doAction');
    Route::post('reorder', 'TipuriIntrebariController@reorderRecords');

});


/** CHESTIONARE INTREBARI **/
Route::middleware(['is-authenticated'])->prefix('chestionare-intrebari')->namespace(\Decalex\Http\Controllers::class)->group(function(){
    
    Route::get('/', 'ChestionareIntrebariController@index'); //->middleware(['has-permission:roles']);
    Route::post('items', 'ChestionareIntrebariController@getItems');
    Route::post('action/{action}', 'ChestionareIntrebariController@doAction');
    // Route::post('reorder', 'ServicesController@reorderServices');
    // Route::post('export', 'ServicesController@export');

    // Route::get('export-preview', 'ServicesController@exportPreview');

});

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


/** CHESTIONARE **/
Route::middleware(['is-authenticated'])->prefix('chestionare')->namespace(\Decalex\Http\Controllers::class)->group(function(){
    
    Route::get('/', 'ChestionareController@index'); 
    Route::post('items', 'ChestionareController@getItems');

    Route::post('save-draft', 'ChestionareController@saveDraft');
    
    Route::post('save-intrebare', 'ChestionareController@saveIntrebare');
    Route::post('update-intrebare', 'ChestionareController@updateIntrebare');
    Route::post('delete-intrebare', 'ChestionareController@deleteIntrebare');
    Route::post('reorder-intrebari', 'ChestionareController@reorderIntrebari');
    Route::post('add-subintrebare', 'ChestionareController@addSubintrebare');
    Route::post('delete-subintrebare', 'ChestionareController@deleteSubintrebare');
    
    Route::post('search-intrebare', 'ChestionareController@searchIntrebare');
    Route::post('add-intrebari', 'ChestionareController@addIntrebari');

    Route::post('insert-raspuns', 'ChestionareController@insertRaspuns');
    Route::post('update-raspuns', 'ChestionareController@updateRaspuns');
    Route::post('delete-raspuns', 'ChestionareController@deleteRaspuns');
    Route::post('reorder-raspunsuri', 'ChestionareController@reorderRaspunsuri');

    Route::post('action/{action}', 'ChestionareController@doAction');
    
    Route::post('export', 'ChestionareController@export');
    Route::post('xls-import', 'ChestionareController@xlsImport');

    Route::get('export-preview/{id}', 'ChestionareController@exportPreview');
});

/** CHESTIONARE TRIMITERI **/
Route::middleware(['is-authenticated'])->prefix('chestionare-trimiteri')->namespace(\Decalex\Http\Controllers::class)->group(function(){
    
    Route::post('action/{action}', 'ChestionareTrimiteriController@doAction');
    Route::post('get-next-number', 'ChestionareTrimiteriController@getNextNumber');
    Route::post('trimite', 'ChestionareTrimiteriController@trimite');

});

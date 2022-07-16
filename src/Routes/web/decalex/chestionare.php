<?php

/** 
 * CHESTIONARE
 **/
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

/** 
 * CHESTIONARE TRIMITERI
 **/
Route::middleware(['is-authenticated'])->prefix('chestionare-trimiteri')->namespace(\Decalex\Http\Controllers::class)->group(function(){
    
    Route::post('action/{action}', 'ChestionareTrimiteriController@doAction');
    Route::post('get-next-number', 'ChestionareTrimiteriController@getNextNumber');
    Route::post('trimite', 'ChestionareTrimiteriController@trimite');

});

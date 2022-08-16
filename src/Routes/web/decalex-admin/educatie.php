<?php

use B2B\Http\Controllers\Decalex;

/**  EDUCATIE **/
Route::middleware(['is-authenticated'])->prefix('educatie')->namespace(Decalex::class)->group(function(){
    
    Route::get('/', 'EducatieController@index'); 
    Route::post('items', 'EducatieController@getItems');
    Route::post('action/{action}', 'EducatieController@doAction');
    Route::post('get-summary', 'EducatieController@getSummary');

    /**
     * KNLOYX
     */
    Route::post('sincronizare', 'EducatieController@doSync');
    Route::post('save-sincronizare', 'EducatieController@saveSync');
    Route::post('open-knolyx-course', 'EducatieController@openKnolyxCourse');

});

/** 
 * EDUCATIE TRIMITERI
 **/
Route::middleware(['is-authenticated'])->prefix('educatie-trimiteri')->namespace(Decalex::class)->group(function(){
    
});

/**
 * CURS FISIERE
 */
Route::middleware(['is-authenticated'])->prefix('curs-fisiere')->namespace(Decalex::class)->group(function(){
    Route::post('items', 'CursFisiereController@getItems');
    Route::post('action/{action}', 'CursFisiereController@doAction');
});


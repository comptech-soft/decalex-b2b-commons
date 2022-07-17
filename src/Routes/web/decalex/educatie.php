<?php

/**  EDUCATIE **/
Route::middleware(['is-authenticated'])->prefix('educatie')->namespace(\B2B\Http\Controllers\Decalex::class)->group(function(){
    
    Route::get('/', 'EducatieController@index'); 
    Route::post('items', 'EducatieController@getItems');
    Route::post('action/{action}', 'EducatieController@doAction');
});

/** 
 * EDUCATIE TRIMITERI
 **/
Route::middleware(['is-authenticated'])->prefix('educatie-trimiteri')->namespace(\B2B\Http\Controllers\Decalex::class)->group(function(){
    
});

/**
 * CURS FISIERE
 */
Route::middleware(['is-authenticated'])->prefix('curs-fisiere')->namespace(\B2B\Http\Controllers\Decalex::class)->group(function(){
    Route::post('items', 'CursFisiereController@getItems');
    Route::post('action/{action}', 'CursFisiereController@doAction');
});


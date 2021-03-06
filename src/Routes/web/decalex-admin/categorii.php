<?php

use B2B\Http\Controllers\Decalex;

/** CATEGORII CHESTIONARE **/
Route::middleware(['is-authenticated'])->prefix('categorii-chestionare')->namespace(Decalex::class)->group(function(){
    
    Route::get('/', 'CategoriiChestionareController@index'); 
    Route::post('items', 'CategoriiChestionareController@getItems');
    Route::post('action/{action}', 'CategoriiChestionareController@doAction');

});

/** CATEGORII CENTRALIZATOARE **/
Route::middleware(['is-authenticated'])->prefix('categorii-centralizatoare')->namespace(Decalex::class)->group(function(){
    
    Route::get('/', 'CategoriiCentralizatoareController@index'); 
    Route::post('items', 'CategoriiCentralizatoareController@getItems');
    Route::post('action/{action}', 'CategoriiCentralizatoareController@doAction');

});

/** CATEGORII CURSURI **/
Route::middleware(['is-authenticated'])->prefix('categorii-cursuri')->namespace(Decalex::class)->group(function(){
    
    Route::get('/', 'CategoriiCursuriController@index'); 
    Route::post('items', 'CategoriiCursuriController@getItems');
    Route::post('action/{action}', 'CategoriiCursuriController@doAction');

});

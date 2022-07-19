<?php

/** 
 * DPIA
 **/
Route::middleware(['is-authenticated'])->prefix('dpia')->namespace(\Decalex\Http\Controllers::class)->group(function(){
    
    Route::get('/', 'DpiaController@index');
    Route::post('items', 'DpiaController@getItems');
    Route::post('action/{action}', 'DpiaController@doAction');

});

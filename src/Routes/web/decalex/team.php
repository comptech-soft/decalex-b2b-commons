<?php

/** 
 * DECALEX TEAM 
 **/
Route::middleware(['is-authenticated'])->prefix('team')->namespace(\Decalex\Http\Controllers::class)->group(function(){
    
    Route::get('/', 'TeamController@index'); 
    Route::post('items', 'TeamController@getItems');
    Route::post('get-available-persons', 'TeamController@getAvailablePersons');
    Route::post('action/{action}', 'TeamController@doAction');

});

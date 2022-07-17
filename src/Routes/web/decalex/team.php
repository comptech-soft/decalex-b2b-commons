<?php

use B2B\Http\Controllers\Decalex;

/** DECALEX TEAM  **/
Route::middleware(['is-authenticated'])->prefix('team')->namespace(Decalex::class)->group(function(){
    
    Route::get('/', 'TeamController@index'); 
    Route::post('items', 'TeamController@getItems');
    Route::post('get-available-persons', 'TeamController@getAvailablePersons');
    Route::post('action/{action}', 'TeamController@doAction');

});

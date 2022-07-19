<?php

/** 
 * CUSTOMER TEAM 
 **/
Route::middleware(['is-authenticated'])->prefix('customer-team')->namespace(\Decalex\Http\Controllers::class)->group(function(){
    
    Route::get('/', 'CustomerTeamController@index');
    Route::post('items', 'CustomerTeamController@getItems');
    Route::post('action/{action}', 'CustomerTeamController@doAction');
});

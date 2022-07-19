<?php

use B2B\Http\Controllers\Client;

/** 
 * CUSTOMER TEAM 
 **/
Route::middleware(['is-authenticated'])->prefix('customer-team')->namespace(Client::class)->group(function(){
    
    Route::get('/', 'CustomerTeamController@index');
    Route::post('items', 'CustomerTeamController@getItems');
    Route::post('action/{action}', 'CustomerTeamController@doAction');
});

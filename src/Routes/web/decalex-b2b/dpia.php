<?php

use B2B\Http\Controllers\Client;

/** 
 * DPIA
 **/
Route::middleware(['is-authenticated'])->prefix('dpia')->namespace(Client::class)->group(function(){
    
    Route::get('/', 'DpiaController@index');
    Route::post('items', 'DpiaController@getItems');
    Route::post('action/{action}', 'DpiaController@doAction');

});

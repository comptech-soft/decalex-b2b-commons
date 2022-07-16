<?php

/** 
 * CONFIGS
 **/
Route::middleware(['is-authenticated'])->prefix('configs')->namespace(\System\Http\Controllers::class)->group(function(){
    
    Route::get('/', 'ConfigsController@index'); //->middleware(['has-permission:roles']);
    Route::post('items', 'ConfigsController@getItems');
    Route::post('action/{action}', 'ConfigsController@doAction');
});
<?php

use B2B\Http\Controllers\System;

/** CONFIGS **/
Route::middleware(['is-authenticated'])->prefix('configs')->namespace(System::class)->group(function(){
    
    Route::get('/', 'ConfigsController@index'); 
    Route::post('items', 'ConfigsController@getItems');
    Route::post('action/{action}', 'ConfigsController@doAction');

});
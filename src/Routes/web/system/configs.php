<?php

/** CONFIGS **/
Route::middleware(['is-authenticated'])->prefix('configs')->namespace(\ComptechSoft\Decalex\Http\Controllers\System::class)->group(function(){
    
    Route::get('/', 'ConfigsController@index'); 
    Route::post('items', 'ConfigsController@getItems');
    Route::post('action/{action}', 'ConfigsController@doAction');

});
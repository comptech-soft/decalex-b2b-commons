<?php

use B2B\Http\Controllers\Client;

/** 
 * PERSONS
 **/
Route::middleware(['is-authenticated'])->prefix('persons')->namespace(Client::class)->group(function(){
    
    Route::get('/', 'PersonsController@index');
    Route::post('items', 'PersonsController@getItems');
    Route::post('action/{action}', 'PersonsController@doAction');
    Route::post('export', 'PersonsController@export');

    Route::get('export-preview', 'PersonsController@exportPreview');
});

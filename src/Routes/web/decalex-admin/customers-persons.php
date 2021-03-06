<?php

use B2B\Http\Controllers\Decalex;

/** ACCOUNTs - conturile clientilor **/
Route::middleware(['is-authenticated'])->prefix('customers-persons')->namespace(Decalex::class)->group(function(){
    
    Route::get('/', 'PersonsController@index'); 
    Route::post('items', 'PersonsController@getItems');
    Route::post('action/{action}', 'PersonsController@doAction');
    Route::post('export', 'PersonsController@export');

    Route::get('export-preview', 'PersonsController@exportPreview');
});

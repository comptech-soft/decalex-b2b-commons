<?php

use B2B\Http\Controllers\Decalex;

/**  TRIMITERI = SHARE  **/
Route::middleware(['is-authenticated'])->prefix('share')->namespace(Decalex::class)->group(function(){
    
    Route::get('/{entity}', 'ShareController@index'); 

    Route::post('action/{action}', 'ShareController@doAction');

    Route::post('get-next-number', 'ShareController@getNextNumber');

    Route::post('send-trimitere', 'ShareController@sendTrimitere');

    
});
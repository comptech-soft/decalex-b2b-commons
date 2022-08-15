<?php

use B2B\Http\Controllers\Decalex;

/**  TRIMITERI = SHARE  **/
Route::middleware(['is-authenticated'])->prefix('share')->namespace(Decalex::class)->group(function(){
    
    Route::get('/{entity}', 'ShareController@index'); 

    
});
<?php

Route::middleware(['is-authenticated'])->prefix('trimiteri')->namespace(\Decalex\Http\Controllers::class)->group(function(){
    
    Route::post('items', 'TrimiteriController@getItems');

    
});

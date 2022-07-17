<?php

Route::middleware(['is-authenticated'])->prefix('trimiteri')->namespace(\B2B\Http\Controllers\Decalex::class)->group(function(){
    
    Route::post('items', 'TrimiteriController@getItems');

    
});

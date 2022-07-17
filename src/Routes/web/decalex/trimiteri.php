<?php

use B2B\Http\Controllers\Decalex;

Route::middleware(['is-authenticated'])->prefix('trimiteri')->namespace(Decalex::class)->group(function(){
    
    Route::post('items', 'TrimiteriController@getItems');

});

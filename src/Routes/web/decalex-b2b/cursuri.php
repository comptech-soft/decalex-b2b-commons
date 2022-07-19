<?php

Route::middleware(['is-authenticated'])->prefix('cursuri')->namespace(\Decalex\Http\Controllers::class)->group(function(){
    Route::get('/', 'CursuriController@index'); 
    Route::post('items', 'CursuriController@getItems');
});

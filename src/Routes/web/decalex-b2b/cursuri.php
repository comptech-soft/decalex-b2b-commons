<?php

use B2B\Http\Controllers\Client;

Route::middleware(['is-authenticated'])->prefix('cursuri')->namespace(Client::class)->group(function(){
    Route::get('/', 'CursuriController@index'); 
    Route::post('items', 'CursuriController@getItems');
});

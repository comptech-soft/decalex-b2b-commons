<?php

/** CATEGORII CURSURI **/

Route::middleware(['is-authenticated'])->prefix('categorii-cursuri')->namespace(\Decalex\Http\Controllers::class)->group(function(){
    
    Route::get('/', 'CategoriiCursuriController@index'); //->middleware(['has-permission:roles']);
    Route::post('items', 'CategoriiCursuriController@getItems');
    Route::post('action/{action}', 'CategoriiCursuriController@doAction');

});

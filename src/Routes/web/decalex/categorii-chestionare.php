<?php

/** CATEGORII CHESTIONARE **/

Route::middleware(['is-authenticated'])->prefix('categorii-chestionare')->namespace(\Decalex\Http\Controllers::class)->group(function(){
    
    Route::get('/', 'CategoriiChestionareController@index'); //->middleware(['has-permission:roles']);
    Route::post('items', 'CategoriiChestionareController@getItems');
    Route::post('action/{action}', 'CategoriiChestionareController@doAction');

});

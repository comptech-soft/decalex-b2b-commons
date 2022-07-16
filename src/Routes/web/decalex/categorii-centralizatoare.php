<?php

/** CATEGORII CENTRALIZATOARE **/

Route::middleware(['is-authenticated'])->prefix('categorii-centralizatoare')->namespace(\Decalex\Http\Controllers::class)->group(function(){
    
    Route::get('/', 'CategoriiCentralizatoareController@index'); //->middleware(['has-permission:roles']);
    Route::post('items', 'CategoriiCentralizatoareController@getItems');
    Route::post('action/{action}', 'CategoriiCentralizatoareController@doAction');

});

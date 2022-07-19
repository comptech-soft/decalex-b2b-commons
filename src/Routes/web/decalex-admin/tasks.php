<?php

use B2B\Http\Controllers\Decalex;

/** NOMENCLATOR TASKS **/
Route::middleware(['is-authenticated'])->prefix('tasks')->namespace(Decalex::class)->group(function(){
    
    Route::get('/', 'TasksController@index'); //->middleware(['has-permission:roles']);
    Route::post('items', 'TasksController@getItems');
    Route::post('action/{action}', 'TasksController@doAction');

});

<?php

/** NOMENCLATOR TASKS **/
Route::middleware(['is-authenticated'])->prefix('tasks')->namespace(\B2B\Http\Controllers\Decalex::class)->group(function(){
    
    Route::get('/', 'TasksController@index'); //->middleware(['has-permission:roles']);
    Route::post('items', 'TasksController@getItems');
    Route::post('action/{action}', 'TasksController@doAction');
    // Route::post('reorder', 'ServicesController@reorderServices');
    // Route::post('export', 'ServicesController@export');

    // Route::get('export-preview', 'ServicesController@exportPreview');

});

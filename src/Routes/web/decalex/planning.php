<?php

/** PLANNING **/
Route::middleware(['is-authenticated'])->prefix('planning')->namespace(\Decalex\Http\Controllers::class)->group(function(){
    
    Route::get('/', 'PlanningController@index'); 
    Route::post('items', 'PlanningController@getItems');
    Route::post('action/{action}', 'PlanningController@doAction');
    Route::post('update-task-status', 'PlanningController@updateTaskStatus');

});

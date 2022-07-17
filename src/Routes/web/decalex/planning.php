<?php

/** PLANNING **/
Route::middleware(['is-authenticated'])->prefix('planning')->namespace(\B2B\Http\Controllers\Decalex::class)->group(function(){
    
    Route::get('/', 'PlanningController@index'); 
    Route::post('items', 'PlanningController@getItems');
    Route::post('action/{action}', 'PlanningController@doAction');
    Route::post('update-task-status', 'PlanningController@updateTaskStatus');

});

/** 
 * PROJECT MANAGEMENT
 **/
Route::middleware(['is-authenticated'])->prefix('project-management')->namespace(\B2B\Http\Controllers\Decalex::class)->group(function(){
    
    Route::get('/', 'ProjectManagementController@index');


});

/** PLANNING **/
Route::middleware(['is-authenticated'])->prefix('timesheet')->namespace(\B2B\Http\Controllers\Decalex::class)->group(function(){
    
    Route::get('/', 'TimesheetController@index');

});


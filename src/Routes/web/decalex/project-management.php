<?php

/** 
 * PROJECT MANAGEMENT
 **/
Route::middleware(['is-authenticated'])->prefix('project-management')->namespace(\Decalex\Http\Controllers::class)->group(function(){
    
    Route::get('/', 'ProjectManagementController@index');


});

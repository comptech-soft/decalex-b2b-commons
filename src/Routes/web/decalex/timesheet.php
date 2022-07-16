<?php

/** PLANNING **/
Route::middleware(['is-authenticated'])->prefix('timesheet')->namespace(\Decalex\Http\Controllers::class)->group(function(){
    
    Route::get('/', 'TimesheetController@index');

});

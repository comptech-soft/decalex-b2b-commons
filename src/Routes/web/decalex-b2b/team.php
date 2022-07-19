<?php

/** 
 * DECALEX TEAM 
 **/
Route::middleware(['is-authenticated'])->prefix('team')->namespace(\Decalex\Http\Controllers::class)->group(function(){
    
    Route::get('/', 'TeamController@index'); //->middleware(['has-permission:roles']);
    Route::post('items', 'TeamController@getItems');
    // /** Ce roluri au useri si cati*/
    // Route::post('users-roles-items', 'RolesController@getUsersRolesItems');
    Route::post('action/{action}', 'TeamController@doAction');
    // Route::post('export', 'RolesController@Export');

});

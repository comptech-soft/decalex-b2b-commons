<?php

/** 
 * ROLES 
 **/
Route::middleware(['is-authenticated'])->prefix('roles')->namespace(\Cartalyst\Http\Controllers::class)->group(function(){
    
    Route::get('/', 'RolesController@index'); //->middleware(['has-permission:roles']);
    Route::post('items', 'RolesController@getItems');
    // /** Ce roluri au useri si cati*/
    // Route::post('users-roles-items', 'RolesController@getUsersRolesItems');
    Route::post('action/{action}', 'RolesController@doAction');
    // Route::post('export', 'RolesController@Export');

});

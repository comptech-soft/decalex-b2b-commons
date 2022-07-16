<?php

/** 
 * PERMISSIONS 
 **/
Route::middleware(['is-authenticated'])->prefix('permissions')->namespace(\Cartalyst\Http\Controllers::class)->group(function(){
    
    Route::get('/', 'PermissionsController@index'); //->middleware(['has-permission:roles']);
    Route::post('items', 'PermissionsController@getItems');
    Route::post('ascendents', 'PermissionsController@getAscendents');
    Route::post('reorder', 'PermissionsController@reorderNodes');
    Route::post('delete-children', 'PermissionsController@deleteChildren');
    Route::post('trees', 'PermissionsController@getTrees');
    
    
    // /** Ce roluri au useri si cati*/
    // Route::post('users-roles-items', 'RolesController@getUsersRolesItems');
    Route::post('action/{action}', 'PermissionsController@doAction');
    // Route::post('export', 'RolesController@Export');

});

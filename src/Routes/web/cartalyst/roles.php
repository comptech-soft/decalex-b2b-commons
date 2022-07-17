<?php

use B2B\Http\Controllers\Cartalyst;

/** ROLES  **/
Route::middleware(['is-authenticated'])->prefix('roles')->namespace(Cartalyst::class)->group(function(){
    
    Route::get('/', 'RolesController@index'); //->middleware(['has-permission:roles']);
    Route::post('items', 'RolesController@getItems');
    // /** Ce roluri au useri si cati*/
    // Route::post('users-roles-items', 'RolesController@getUsersRolesItems');
    Route::post('action/{action}', 'RolesController@doAction');
    // Route::post('export', 'RolesController@Export');

});

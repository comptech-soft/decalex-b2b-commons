<?php

use B2B\Http\Controllers\Cartalyst;

/** PERMISSIONS **/
Route::middleware(['is-authenticated'])->prefix('permissions')->namespace(Cartalyst::class)->group(function(){
    
    Route::get('/', 'PermissionsController@index'); //->middleware(['has-permission:roles']);

    Route::post('items', 'PermissionsController@getItems');
    Route::post('ascendents', 'PermissionsController@getAscendents');
    Route::post('reorder', 'PermissionsController@reorderNodes');
    Route::post('delete-children', 'PermissionsController@deleteChildren');
    Route::post('trees', 'PermissionsController@getTrees');
        
    Route::post('action/{action}', 'PermissionsController@doAction');

});

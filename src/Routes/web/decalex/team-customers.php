<?php

/** 
 * DECALEX TEAM - CUSTOMERS
 * Clientii unui operator
 **/
Route::middleware(['is-authenticated'])->prefix('team-customers')->namespace(\Decalex\Http\Controllers::class)->group(function(){
    
    // Route::get('/', 'TeamCustomersController@index'); //->middleware(['has-permission:roles']);

    /** Ce clienti are un user Decalex */
    Route::post('items', 'TeamCustomersController@getItems');
    
    /** Ce useri decalex are un client */
    Route::post('users', 'TeamCustomersController@getUsers');

    // /** Ce roluri au useri si cati*/
    // Route::post('users-roles-items', 'RolesController@getUsersRolesItems');
    // Route::post('action/{action}', 'TeamController@doAction');
    // Route::post('export', 'RolesController@Export');

});

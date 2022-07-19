<?php

use B2B\Http\Controllers\Decalex;

/** 
 * DECALEX TEAM - CUSTOMERS
 * Clientii unui operator
 **/
Route::middleware(['is-authenticated'])->prefix('team-customers')->namespace(Decalex::class)->group(function(){
    
    // Route::get('/', 'TeamCustomersController@index'); //->middleware(['has-permission:roles']);

    /** Ce clienti are un user Decalex */
    Route::post('items', 'TeamCustomersController@getItems');
    
    /** Ce useri decalex are un client */
    Route::post('users', 'TeamCustomersController@getUsers');

});

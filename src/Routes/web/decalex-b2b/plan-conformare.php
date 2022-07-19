<?php

use B2B\Http\Controllers\Client;

/** 
 * PLAN CONFORMARE
 **/
Route::middleware(['is-authenticated'])->prefix('plan-conformare')->namespace(Client::class)->group(function(){
    
    Route::get('/', 'PlanConformareController@index');
    Route::post('items', 'PlanConformareController@getItems');
    Route::post('action/{action}', 'PlanConformareController@doAction');

});

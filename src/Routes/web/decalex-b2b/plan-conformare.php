<?php

/** 
 * PLAN CONFORMARE
 **/
Route::middleware(['is-authenticated'])->prefix('plan-conformare')->namespace(\Decalex\Http\Controllers::class)->group(function(){
    
    Route::get('/', 'PlanConformareController@index');
    Route::post('items', 'PlanConformareController@getItems');
    Route::post('action/{action}', 'PlanConformareController@doAction');

});

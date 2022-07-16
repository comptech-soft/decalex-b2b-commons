<?php

/** 
 * EMAIL TEMPLATES
 **/
Route::middleware(['is-authenticated'])->prefix('email-templates')->namespace(\Decalex\Http\Controllers::class)->group(function(){
    
    Route::get('/', 'EmailTemplatesController@index'); //->middleware(['has-permission:roles']);
    Route::post('items', 'EmailTemplatesController@getItems');
    Route::post('action/{action}', 'EmailTemplatesController@doAction');
    // Route::post('reorder', 'ServicesController@reorderServices');
    // Route::post('export', 'ServicesController@export');

    // Route::get('export-preview', 'ServicesController@exportPreview');

});

<?php

use B2B\Http\Controllers\Decalex;

/** EMAIL TEMPLATES **/
Route::middleware(['is-authenticated'])->prefix('email-templates')->namespace(Decalex::class)->group(function(){
    
    Route::get('/', 'EmailTemplatesController@index'); //->middleware(['has-permission:roles']);
    Route::post('items', 'EmailTemplatesController@getItems');
    Route::post('action/{action}', 'EmailTemplatesController@doAction');

    Route::post('validate-unique-email-name', 'EmailTemplatesController@validateUniqueEmailName');
    Route::post('validate-unique-email-template', 'EmailTemplatesController@validateUniqueEmailTemplate');
    
    
});

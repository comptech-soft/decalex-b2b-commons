<?php

/** CUSTOMERS FOLDERS **/
Route::middleware(['is-authenticated'])->prefix('customers-folders')->namespace(\Decalex\Http\Controllers::class)->group(function(){
    
    Route::post('items', 'CustomersFoldersController@getItems');
    Route::post('action/{action}', 'CustomersFoldersController@doAction');

});

/** CUSTOMERS FILES **/
Route::middleware(['is-authenticated'])->prefix('customers-files')->namespace(\Decalex\Http\Controllers::class)->group(function(){
    
    Route::post('items', 'CustomersFilesController@getItems');
    Route::post('change-status', 'CustomersFilesController@changeStatus');
    Route::post('change-files-status', 'CustomersFilesController@changeFilesStatus');
    Route::post('attach-register-files', 'CustomersFilesController@attachRegisterFiles');
    Route::post('get-register-row-files', 'CustomersFilesController@getRegisterRowFiles');
    
    
    Route::post('action/{action}', 'CustomersFilesController@doAction');

});

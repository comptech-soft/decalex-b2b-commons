<?php

use B2B\Http\Controllers\Decalex;

/** CUSTOMERS FOLDERS **/
Route::middleware(['is-authenticated'])->prefix('customers-folders')->namespace(Decalex::class)->group(function(){
    
    Route::get('/', 'CustomersFoldersController@index'); 

    Route::post('items', 'CustomersFoldersController@getItems');
    Route::post('action/{action}', 'CustomersFoldersController@doAction');

    Route::post('get-ancestors', 'CustomersFoldersController@getFolderAncestors');
    Route::post('get-summaries', 'CustomersFoldersController@getSummaries');
    Route::post('validate-folder-name', 'CustomersFoldersController@validateFolderName');
});

/** CUSTOMERS FILES **/
Route::middleware(['is-authenticated'])->prefix('customers-files')->namespace(Decalex::class)->group(function(){
    
    Route::post('items', 'CustomersFilesController@getItems');
    Route::post('change-status', 'CustomersFilesController@changeStatus');
    Route::post('change-files-status', 'CustomersFilesController@changeFilesStatus');
    Route::post('delete-files', 'CustomersFilesController@deleteFiles');

    Route::post('attach-register-files', 'CustomersFilesController@attachRegisterFiles');
    Route::post('get-register-row-files', 'CustomersFilesController@getRegisterRowFiles');

    Route::post('action/{action}', 'CustomersFilesController@doAction');

});

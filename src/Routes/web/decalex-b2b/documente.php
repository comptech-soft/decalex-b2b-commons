<?php

    Route::middleware(['is-authenticated'])->prefix('documente')->namespace(\Decalex\Http\Controllers::class)->group(function(){
        Route::get('/', 'DocumenteController@index'); 
    });

    /** CUSTOMERS FOLDERS **/
    Route::middleware(['is-authenticated'])->prefix('customers-folders')->namespace(\Decalex\Http\Controllers::class)->group(function(){
        
        Route::post('items', 'CustomersFoldersController@getItems');
        Route::post('action/{action}', 'CustomersFoldersController@doAction');

    });

    /** CUSTOMERS FILES **/
    Route::middleware(['is-authenticated'])->prefix('customers-files')->namespace(\Decalex\Http\Controllers::class)->group(function(){
        
        Route::post('items', 'CustomersFilesController@getItems');
        Route::post('change-status', 'CustomersFilesController@changeStatus');
        Route::post('action/{action}', 'CustomersFilesController@doAction');

    });

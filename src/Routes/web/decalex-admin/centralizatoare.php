<?php

use B2B\Http\Controllers\Decalex;

/** CENTRALIZATOARE **/
Route::middleware(['is-authenticated'])->prefix('centralizatoare')->namespace(Decalex::class)->group(function(){
    
    Route::get('/', 'CentralizatoareController@index'); //->middleware(['has-permission:roles']);
    Route::post('items', 'CentralizatoareController@getItems');
    Route::post('action/{action}', 'CentralizatoareController@doAction');
    Route::post('reorder-columns', 'CentralizatoareController@reorderColumns');

    Route::post('export', 'CentralizatoareController@export');
    Route::get('export-preview/{id}', 'CentralizatoareController@exportPreview');

    Route::post('xls-import', 'CentralizatoareController@xlsImport');

});

/**  CENTRALIZATOARE **/
Route::middleware(['is-authenticated'])->prefix('centralizatoare-coloane')->namespace(Decalex::class)->group(function(){
    
    Route::post('action/{action}', 'CentralizatoareColoaneController@doAction');

});

<?php

use B2B\Http\Controllers\System;

/** COUNTRIES **/
Route::middleware(['is-authenticated'])->prefix('countries')->namespace(System::class)->group(function(){
    
    Route::get('/', 'CountriesController@index'); //->middleware(['has-permission:roles']);
    Route::post('items', 'CountriesController@getItems');
    Route::post('country', 'CountriesController@getCountry');
    Route::post('action/{action}', 'CountriesController@doAction');

});

/** REGIONS **/
Route::middleware(['is-authenticated'])->prefix('regions')->namespace(System::class)->group(function(){
    
    Route::post('items', 'RegionsController@getItems');
    Route::post('action/{action}', 'RegionsController@doAction');

});

/** CITIES **/
Route::middleware(['is-authenticated'])->prefix('cities')->namespace(System::class)->group(function(){
    
    Route::post('items', 'CitiesController@getItems');
    Route::post('action/{action}', 'CitiesController@doAction');

});
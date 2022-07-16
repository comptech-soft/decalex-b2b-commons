<?php

use Illuminate\Support\Facades\Route;

Route::namespace(\System\Http\Controllers::class)->prefix('system')->group(function(){
    Route::post('get-config', 'SystemController@getConfig');
});
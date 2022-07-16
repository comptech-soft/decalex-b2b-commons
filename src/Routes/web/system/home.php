<?php

use Illuminate\Support\Facades\Route;

Route::namespace(\System\Http\Controllers::class)->group(function(){
    Route::get('/', 'HomeController@index');
});

<?php

use Illuminate\Support\Facades\Route;

Route::namespace(\B2B\Http\Controllers\System::class)->group(function(){
    Route::get('/', 'HomeController@index');
});

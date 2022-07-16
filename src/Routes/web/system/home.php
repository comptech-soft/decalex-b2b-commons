<?php

use Illuminate\Support\Facades\Route;

Route::namespace(\ComptechSoft\Decalex\Http\Controllers\System::class)->group(function(){
    Route::get('/', 'HomeController@index');
});

<?php

use Illuminate\Support\Facades\Route;

Route::namespace(\ComptechSoft\Decalex\Http\Controllers\System::class)->prefix('system')->group(function(){
    Route::get('set-locale/{locale}', 'SystemController@setLocale');
});
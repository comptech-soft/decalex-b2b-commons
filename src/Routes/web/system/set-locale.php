<?php

use Illuminate\Support\Facades\Route;

Route::namespace(\B2B\Http\Controllers\System::class)->prefix('system')->group(function(){
    Route::get('set-locale/{locale}', 'SystemController@setLocale');
});
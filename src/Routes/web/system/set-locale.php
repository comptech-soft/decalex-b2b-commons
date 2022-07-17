<?php

use B2B\Http\Controllers\System;

Route::namespace(System::class)->prefix('system')->group(function(){
    Route::get('set-locale/{locale}', 'SystemController@setLocale');
});
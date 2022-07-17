<?php

use B2B\Http\Controllers\System;

Route::namespace(System::class)->group(function(){
    Route::get('/', 'HomeController@index');
});

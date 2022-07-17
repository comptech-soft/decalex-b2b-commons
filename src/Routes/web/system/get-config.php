<?php

use B2B\Http\Controllers\System;

Route::namespace(System::class)->prefix('system')->group(function(){
    Route::post('get-config', 'SystemController@getConfig');
});
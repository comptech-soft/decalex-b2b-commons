<?php

use B2B\Http\Controllers\System;

Route::prefix('database')->namespace(System::class)->group(function(){

    Route::post('update-field', 'DatabaseController@updateField');

});
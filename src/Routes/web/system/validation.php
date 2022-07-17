<?php

use B2B\Http\Controllers\System;

Route::prefix('validation')->namespace(System::class)->group(function(){

    Route::post('unique', 'ValidationController@unique');

});
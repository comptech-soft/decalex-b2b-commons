<?php

Route::prefix('validation')->namespace(\B2B\Http\Controllers\System::class)->group(function(){

    Route::post('unique', 'ValidationController@unique');

});
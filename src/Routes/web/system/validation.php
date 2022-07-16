<?php

Route::prefix('validation')->namespace(\System\Http\Controllers::class)->group(function(){

    Route::post('unique', 'ValidationController@unique');

});
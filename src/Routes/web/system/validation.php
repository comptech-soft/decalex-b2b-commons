<?php

Route::prefix('validation')->namespace(\ComptechSoft\Decalex\Http\Controllers\System::class)->group(function(){

    Route::post('unique', 'ValidationController@unique');

});
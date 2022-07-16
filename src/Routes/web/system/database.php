<?php

Route::prefix('database')->namespace(\System\Http\Controllers::class)->group(function(){

    Route::post('update-field', 'DatabaseController@updateField');

});
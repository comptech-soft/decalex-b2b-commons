<?php

Route::prefix('database')->namespace(\B2B\Http\Controllers\System::class)->group(function(){

    Route::post('update-field', 'DatabaseController@updateField');

});
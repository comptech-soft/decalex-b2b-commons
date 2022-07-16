<?php

Route::prefix('database')->namespace(\ComptechSoft\Decalex\Http\Controllers\System::class)->group(function(){

    Route::post('update-field', 'DatabaseController@updateField');

});
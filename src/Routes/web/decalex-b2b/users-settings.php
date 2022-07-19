<?php

Route::prefix('user-settings')->namespace(\Decalex\Http\Controllers::class)->group(function(){
    
    Route::post('save', 'UserSettingsController@saveSetting'); 

});

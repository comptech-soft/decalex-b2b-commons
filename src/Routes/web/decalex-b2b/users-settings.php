<?php

use B2B\Http\Controllers\Client;

Route::prefix('user-settings')->namespace(Client::class)->group(function(){
    
    Route::post('save', 'UserSettingsController@saveSetting'); 

});

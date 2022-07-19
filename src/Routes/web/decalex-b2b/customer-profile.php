<?php

use B2B\Http\Controllers\Client;

Route::middleware(['is-authenticated'])->prefix('customer-profile')->namespace(Client::class)->group(function(){
    
    Route::get('/', 'CustomerProfileController@index'); 

});

<?php

Route::middleware(['is-authenticated'])->prefix('customer-profile')->namespace(\Decalex\Http\Controllers::class)->group(function(){
    
    Route::get('/', 'CustomerProfileController@index'); 

});

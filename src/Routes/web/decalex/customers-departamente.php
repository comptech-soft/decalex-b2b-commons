<?php

Route::middleware(['is-authenticated'])->prefix('customers-departamente')->namespace(\Decalex\Http\Controllers::class)->group(function(){
    Route::post('items', 'CustomersDepartamenteController@getItems');
    Route::post('action/{action}', 'CustomersDepartamenteController@doAction');
});

<?php

use B2B\Http\Controllers\Decalex;

Route::middleware(['is-authenticated'])->prefix('customers-departamente')->namespace(Decalex::class)->group(function(){

    Route::post('items', 'CustomersDepartamenteController@getItems');
    Route::post('action/{action}', 'CustomersDepartamenteController@doAction');

});

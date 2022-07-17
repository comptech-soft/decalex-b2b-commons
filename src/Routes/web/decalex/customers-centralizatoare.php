<?php

Route::middleware(['is-authenticated'])->prefix('customers-centralizatoare')->namespace(\Decalex\Http\Controllers::class)->group(function(){
    Route::post('items', 'CustomersCentralizatoareController@getItems');
});
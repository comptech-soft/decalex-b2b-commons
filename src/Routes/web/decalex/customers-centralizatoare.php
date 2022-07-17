<?php

Route::middleware(['is-authenticated'])->prefix('customers-centralizatoare')->namespace(\B2B\Http\Controllers\Decalex::class)->group(function(){
    Route::post('items', 'CustomersCentralizatoareController@getItems');
});
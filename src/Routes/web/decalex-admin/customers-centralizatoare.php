<?php

use B2B\Http\Controllers\Decalex;

Route::middleware(['is-authenticated'])->prefix('customers-centralizatoare')->namespace(Decalex::class)->group(function(){

    Route::post('items', 'CustomersCentralizatoareController@getItems');

    Route::post('get-summaries', 'CustomersCentralizatoareController@getSummaries');

});
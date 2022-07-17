<?php

/** RAPOARTE **/
Route::middleware(['is-authenticated'])->prefix('rapoarte')->namespace(\B2B\Http\Controllers\Decalex::class)->group(function(){
    
    Route::get('{categorie}', 'RapoarteController@index');

});

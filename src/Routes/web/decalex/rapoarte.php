<?php

use B2B\Http\Controllers\Decalex;

/** RAPOARTE **/
Route::middleware(['is-authenticated'])->prefix('rapoarte')->namespace(Decalex::class)->group(function(){
    
    Route::get('{categorie}', 'RapoarteController@index');

});

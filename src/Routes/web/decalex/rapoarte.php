<?php

/** PLANNING **/
Route::middleware(['is-authenticated'])->prefix('rapoarte')->namespace(\Decalex\Http\Controllers::class)->group(function(){
    
    Route::get('{categorie}', 'RapoarteController@index');

});

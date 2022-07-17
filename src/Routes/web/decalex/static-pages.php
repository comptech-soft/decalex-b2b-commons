<?php

Route::namespace(\Decalex\Http\Controllers::class)->group(function(){
    
    Route::get('politica-cookies', 'StaticPagesController@politicaCookiesIndex'); 
    Route::get('termeni-legali-si-conditii-confidentialitate', 'StaticPagesController@termeniLegaliIndex'); 
    Route::get('contact', 'StaticPagesController@contactIndex'); 

});

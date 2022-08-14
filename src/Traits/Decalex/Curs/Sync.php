<?php

namespace B2B\Traits\Decalex\Curs;

use B2B\Performers\Decalex\Curs\DoSync;
use B2B\Performers\Decalex\Curs\SaveSync;

trait Sync {

    public static function doSync($input) {
        return (new DoSync($input))
            ->SetSuccessMessage('Preluare cursuri efectuată cu succes!')
            ->Perform();
    }
    
    public static function saveSync($input) {
        return (new SaveSync($input))
            ->SetSuccessMessage('Salvarea cursurilor efectuată cu succes!')
            ->Perform();
    }
}
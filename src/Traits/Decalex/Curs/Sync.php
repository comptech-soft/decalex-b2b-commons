<?php

namespace B2B\Traits\Decalex\Curs;

use B2B\Performers\Decalex\Curs\DoSync;

trait Sync {

    public static function doSync($input) {
        return (new DoSync($input))
            ->SetSuccessMessage('Preluare cursuri efectuată cu succes!')
            ->Perform();
    } 
}
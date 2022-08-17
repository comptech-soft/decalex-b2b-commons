<?php

namespace B2B\Traits\Decalex\Trimitere;

use B2B\Performers\Decalex\Trimitere\Trimite as TrimiteLivrabil;
use B2B\Performers\Decalex\Trimitere\SendTrimitere;

trait Trimite {


    

    public static function sendTrimitere($input) {
        return (new SendTrimitere($input))
            ->SetSuccessMessage('Trimitere efectuată cu success!')
            ->Perform();
    }



    public static function trimite($input) {
        return (new TrimiteLivrabil($input))
            ->SetSuccessMessage('Trimitere efectuată cu success!')
            ->Perform();
    }

}
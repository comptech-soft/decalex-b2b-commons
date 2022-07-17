<?php

namespace B2B\Traits\Decalex\Trimitere;

trait Trimite {

    public static function trimite($input) {
        return (new \B2B\Performers\Decalex\Trimitere\Trimite($input))
            ->SetSuccessMessage('Trimitere efectuată cu success!')
            ->Perform();
    }

}
<?php

namespace Decalex\Traits\Trimitere;

trait Trimite {

    public static function trimite($input) {
        return (new \Decalex\Performers\Trimitere\Trimite($input))
            ->SetSuccessMessage('Trimitere efectuată cu success!')
            ->Perform();
    }

}
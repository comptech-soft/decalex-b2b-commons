<?php

namespace B2B\Traits\Decalex\Trimitere;

use B2B\Performers\Decalex\Trimitere\Trimite as TrimiteLivrabil;

trait Trimite {

    public static function trimite($input) {
        return (new TrimiteLivrabil($input))
            ->SetSuccessMessage('Trimitere efectuată cu success!')
            ->Perform();
    }

}
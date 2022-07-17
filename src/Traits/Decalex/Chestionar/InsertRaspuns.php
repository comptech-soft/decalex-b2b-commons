<?php

namespace B2B\Traits\Decalex\Chestionar;

use B2B\Performers\Decalex\Chestionar\InsertRaspuns as ChestionarInsertRaspuns;

trait InsertRaspuns {

    public static function insertRaspuns($input) {
        return (new ChestionarInsertRaspuns($input))
            ->SetSuccessMessage('Salvare cu success!')
            ->Perform();
    }

}
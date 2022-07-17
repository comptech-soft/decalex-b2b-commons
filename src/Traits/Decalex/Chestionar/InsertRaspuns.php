<?php

namespace B2B\Traits\Decalex\Chestionar;

trait InsertRaspuns {

    public static function insertRaspuns($input) {
        return (new \B2B\Performers\Decalex\Chestionar\InsertRaspuns($input))
            ->SetSuccessMessage('Salvare cu success!')
            ->Perform();
    }

}
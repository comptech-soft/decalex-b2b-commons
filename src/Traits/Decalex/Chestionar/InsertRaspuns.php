<?php

namespace Decalex\Traits\Chestionar;

trait InsertRaspuns {

    public static function insertRaspuns($input) {
        return (new \Decalex\Performers\Chestionar\InsertRaspuns($input))
            ->SetSuccessMessage('Salvare cu success!')
            ->Perform();
    }

}
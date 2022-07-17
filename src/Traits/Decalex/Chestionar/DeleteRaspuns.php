<?php

namespace B2B\Traits\Decalex\Chestionar;

trait DeleteRaspuns {

    public static function deleteRaspuns($input) {
        return (new \B2B\Performers\Decalex\Chestionar\DeleteRaspuns($input))
            ->SetSuccessMessage('Salvare cu success!')
            ->Perform();
    }

}
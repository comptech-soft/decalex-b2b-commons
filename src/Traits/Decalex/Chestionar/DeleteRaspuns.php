<?php

namespace Decalex\Traits\Chestionar;

trait DeleteRaspuns {

    public static function deleteRaspuns($input) {
        return (new \Decalex\Performers\Chestionar\DeleteRaspuns($input))
            ->SetSuccessMessage('Salvare cu success!')
            ->Perform();
    }

}
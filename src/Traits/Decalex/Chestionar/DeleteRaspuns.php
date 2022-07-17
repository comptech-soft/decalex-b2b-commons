<?php

namespace B2B\Traits\Decalex\Chestionar;

use B2B\Performers\Decalex\Chestionar\DeleteRaspuns as ChestionarDeleteRaspuns;

trait DeleteRaspuns {

    public static function deleteRaspuns($input) {
        return (new ChestionarDeleteRaspuns($input))
            ->SetSuccessMessage('Salvare cu success!')
            ->Perform();
    }

}
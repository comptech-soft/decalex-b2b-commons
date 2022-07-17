<?php

namespace B2B\Traits\Decalex\Chestionar;

use B2B\Performers\Decalex\Chestionar\UpdateRaspuns as ChestionarUpdateRaspuns;

trait UpdateRaspuns {

    public static function updateRaspuns($input) {
        return (new ChestionarUpdateRaspuns($input))
            ->SetSuccessMessage('Salvare cu success!')
            ->Perform();
    }

}
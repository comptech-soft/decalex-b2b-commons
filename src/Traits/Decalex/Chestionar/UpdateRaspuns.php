<?php

namespace B2B\Traits\Decalex\Chestionar;

trait UpdateRaspuns {

    public static function updateRaspuns($input) {
        return (new \B2B\Performers\Decalex\Chestionar\UpdateRaspuns($input))
            ->SetSuccessMessage('Salvare cu success!')
            ->Perform();
    }

}
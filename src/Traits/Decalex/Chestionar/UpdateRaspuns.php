<?php

namespace B2B\Traits\Decalex\Chestionar;

trait UpdateRaspuns {

    public static function updateRaspuns($input) {
        return (new \Decalex\Performers\Chestionar\UpdateRaspuns($input))
            ->SetSuccessMessage('Salvare cu success!')
            ->Perform();
    }

}
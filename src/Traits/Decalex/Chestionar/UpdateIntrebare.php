<?php

namespace B2B\Traits\Decalex\Chestionar;

trait UpdateIntrebare {

    public static function updateIntrebare($input) {
        return (new \Decalex\Performers\Chestionar\UpdateIntrebare($input))
            ->SetSuccessMessage('Salvare cu success!')
            ->Perform();
    }

}
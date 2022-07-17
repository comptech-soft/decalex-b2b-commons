<?php

namespace B2B\Traits\Decalex\Chestionar;

trait UpdateIntrebare {

    public static function updateIntrebare($input) {
        return (new \B2B\Performers\Decalex\Chestionar\UpdateIntrebare($input))
            ->SetSuccessMessage('Salvare cu success!')
            ->Perform();
    }

}
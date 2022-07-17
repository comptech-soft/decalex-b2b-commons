<?php

namespace B2B\Traits\Decalex\Chestionar;

trait SaveIntrebare {

    public static function saveIntrebare($input) {
        return (new \B2B\Performers\Decalex\Chestionar\SaveIntrebare($input))
            ->SetSuccessMessage('Salvare cu success!')
            ->Perform();
    }

}
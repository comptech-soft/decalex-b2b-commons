<?php

namespace B2B\Traits\Decalex\Chestionar;

trait SaveIntrebare {

    public static function saveIntrebare($input) {
        return (new \Decalex\Performers\Chestionar\SaveIntrebare($input))
            ->SetSuccessMessage('Salvare cu success!')
            ->Perform();
    }

}
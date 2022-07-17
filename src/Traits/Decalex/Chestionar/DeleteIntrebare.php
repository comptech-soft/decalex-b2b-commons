<?php

namespace B2B\Traits\Decalex\Chestionar;

trait DeleteIntrebare {

    public static function deleteIntrebare($input) {
        return (new \B2B\Performers\Decalex\Chestionar\DeleteIntrebare($input))
            ->SetSuccessMessage('Salvare cu success!')
            ->Perform();
    }

}
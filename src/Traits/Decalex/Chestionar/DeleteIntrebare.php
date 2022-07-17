<?php

namespace B2B\Traits\Decalex\Chestionar;

use B2B\Performers\Decalex\Chestionar\DeleteIntrebare as CentralizatorDeleteIntrebare;

trait DeleteIntrebare {

    public static function deleteIntrebare($input) {
        return (new CentralizatorDeleteIntrebare($input))
            ->SetSuccessMessage('Salvare cu success!')
            ->Perform();
    }

}
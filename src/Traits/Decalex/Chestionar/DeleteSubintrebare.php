<?php

namespace B2B\Traits\Decalex\Chestionar;

use B2B\Performers\Decalex\Chestionar\DeleteSubintrebare as ChestionarDeleteSubintrebare;

trait DeleteSubintrebare {

    public static function deleteSubintrebare($input) {
        return (new ChestionarDeleteSubintrebare($input))
            ->SetSuccessMessage('Salvare cu success!')
            ->Perform();
    }

}
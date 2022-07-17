<?php

namespace B2B\Traits\Decalex\Chestionar;

use B2B\Performers\Decalex\Chestionar\AddSubintrebare as ChestionarAddSubintrebare;

trait AddSubintrebare {

    public static function addSubintrebare($input) {
        return (new ChestionarAddSubintrebare($input))
            ->SetSuccessMessage('Salvare cu success!')
            ->Perform();
    }

}
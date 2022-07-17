<?php

namespace B2B\Traits\Decalex\Chestionar;

use B2B\Performers\Decalex\Chestionar\UpdateIntrebare as ChestionarUpdateIntrebare;

trait UpdateIntrebare {

    public static function updateIntrebare($input) {
        return (new ChestionarUpdateIntrebare($input))
            ->SetSuccessMessage('Salvare cu success!')
            ->Perform();
    }

}
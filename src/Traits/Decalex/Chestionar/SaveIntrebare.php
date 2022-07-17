<?php

namespace B2B\Traits\Decalex\Chestionar;

use B2B\Performers\Decalex\Chestionar\SaveIntrebare as ChestionarSaveIntrebare;

trait SaveIntrebare {

    public static function saveIntrebare($input) {
        return (new ChestionarSaveIntrebare($input))
            ->SetSuccessMessage('Salvare cu success!')
            ->Perform();
    }

}
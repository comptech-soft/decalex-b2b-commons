<?php

namespace B2B\Traits\Decalex\Chestionar;

use B2B\Performers\Decalex\Chestionar\SearchIntrebare as ChestionarSearchIntrebare;

trait SearchIntrebare {

    public static function searchIntrebare($input) {
        return (new ChestionarSearchIntrebare($input))
            ->SetSuccessMessage('Încarcare întrebări cu success!')
            ->Perform();
    }

}
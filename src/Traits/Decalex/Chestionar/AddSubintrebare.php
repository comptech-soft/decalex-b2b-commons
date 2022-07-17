<?php

namespace B2B\Traits\Decalex\Chestionar;

trait AddSubintrebare {

    public static function addSubintrebare($input) {
        return (new \B2B\Performers\Decalex\Chestionar\AddSubintrebare($input))
            ->SetSuccessMessage('Salvare cu success!')
            ->Perform();
    }

}
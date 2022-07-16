<?php

namespace Decalex\Traits\Chestionar;

trait AddSubintrebare {

    public static function addSubintrebare($input) {
        return (new \Decalex\Performers\Chestionar\AddSubintrebare($input))
            ->SetSuccessMessage('Salvare cu success!')
            ->Perform();
    }

}
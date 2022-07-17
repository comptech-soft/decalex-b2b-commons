<?php

namespace B2B\Traits\Decalex\Chestionar;

use B2B\Performers\Decalex\Chestionar\AddIntrebari as ChestionarAddIntrebari;

trait AddIntrebari {

    public static function addIntrebari($input) {
        return (new ChestionarAddIntrebari($input))
            ->SetSuccessMessage('Adaugare cu success!')
            ->Perform();
    }

}
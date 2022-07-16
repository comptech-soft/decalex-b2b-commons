<?php

namespace Decalex\Traits\Chestionar;

trait AddIntrebari {

    public static function addIntrebari($input) {
        return (new \Decalex\Performers\Chestionar\AddIntrebari($input))
            ->SetSuccessMessage('Adaugare cu success!')
            ->Perform();
    }

}
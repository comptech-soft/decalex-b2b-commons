<?php

namespace B2B\Traits\Decalex\Chestionar;

trait AddIntrebari {

    public static function addIntrebari($input) {
        return (new \B2B\Performers\Decalex\Chestionar\AddIntrebari($input))
            ->SetSuccessMessage('Adaugare cu success!')
            ->Perform();
    }

}
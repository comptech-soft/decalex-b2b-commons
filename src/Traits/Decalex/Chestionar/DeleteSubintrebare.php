<?php

namespace B2B\Traits\Decalex\Chestionar;

trait DeleteSubintrebare {

    public static function deleteSubintrebare($input) {
        return (new \B2B\Performers\Decalex\Chestionar\DeleteSubintrebare($input))
            ->SetSuccessMessage('Salvare cu success!')
            ->Perform();
    }

}
<?php

namespace B2B\Traits\Decalex\Chestionar;

trait XlsImport {

    public static function xlsImport($input) {
        return (new \Decalex\Performers\Chestionar\XlsImport($input))
            ->SetSuccessMessage('Import realizat cu success!')
            ->Perform();
    }

}
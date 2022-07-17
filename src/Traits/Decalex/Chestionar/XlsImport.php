<?php

namespace B2B\Traits\Decalex\Chestionar;

trait XlsImport {

    public static function xlsImport($input) {
        return (new \B2B\Performers\Decalex\Chestionar\XlsImport($input))
            ->SetSuccessMessage('Import realizat cu success!')
            ->Perform();
    }

}
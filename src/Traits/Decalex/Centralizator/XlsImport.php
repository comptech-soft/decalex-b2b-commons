<?php

namespace B2B\Traits\Decalex\Centralizator;

trait XlsImport {

    public static function xlsImport($input) {
        return (new \B2B\Performers\Decalex\Centralizator\XlsImport($input))
            ->SetSuccessMessage('Import realizat cu success!')
            ->Perform();
    }

}
<?php

namespace B2B\Traits\Decalex\Centralizator;

use B2B\Performers\Decalex\Centralizator\XlsImport as CentralizatorImport;

trait XlsImport {

    public static function xlsImport($input) {
        return (new CentralizatorImport($input))
            ->SetSuccessMessage('Import realizat cu success!')
            ->Perform();
    }

}
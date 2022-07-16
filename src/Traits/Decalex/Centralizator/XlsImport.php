<?php

namespace Decalex\Traits\Centralizator;

trait XlsImport {

    public static function xlsImport($input) {
        return (new \Decalex\Performers\Centralizator\XlsImport($input))
            ->SetSuccessMessage('Import realizat cu success!')
            ->Perform();
    }

}
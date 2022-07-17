<?php

namespace B2B\Traits\Decalex\Customer;

trait XlsImport {

    public static function xlsImport($input) {
        return (new \Decalex\Performers\Customer\XlsImport($input))
            ->SetSuccessMessage('Import realizat cu success!')
            ->Perform();
    }

}
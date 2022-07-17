<?php

namespace B2B\Traits\Decalex\Customer;

trait XlsImport {

    public static function xlsImport($input) {
        return (new \B2B\Performers\Decalex\Customer\XlsImport($input))
            ->SetSuccessMessage('Import realizat cu success!')
            ->Perform();
    }

}
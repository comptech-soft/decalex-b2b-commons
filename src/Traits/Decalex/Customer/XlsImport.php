<?php

namespace B2B\Traits\Decalex\Customer;

use B2B\Performers\Decalex\Customer\XlsImport as CustomerXlsImport;

trait XlsImport {

    public static function xlsImport($input) {
        return (new CustomerXlsImport($input))
            ->SetSuccessMessage('Import realizat cu success!')
            ->Perform();
    }

}
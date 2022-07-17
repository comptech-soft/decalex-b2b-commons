<?php

namespace B2B\Traits\Decalex\Chestionar;

use B2B\Performers\Decalex\Chestionar\XlsImport as ChestionarXlsImport;

trait XlsImport {

    public static function xlsImport($input) {
        return (new ChestionarXlsImport($input))
            ->SetSuccessMessage('Import realizat cu success!')
            ->Perform();
    }

}
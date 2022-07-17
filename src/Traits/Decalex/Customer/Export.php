<?php

namespace B2B\Traits\Decalex\Customer;

use B2B\Classes\Comptech\Performers\Datatable\Export as ExportPerformer;

trait Export {

    public static $exportedColumns = [
        'id' => [
            'caption' => '#ID',
        ],
    ];

    public static function export($input) {
        return (new ExportPerformer(
            $input, 
            __CLASS__, 
            'exports.customers.xls-export', 
            self::$exportedColumns
            
        ))->Perform();
    }

}
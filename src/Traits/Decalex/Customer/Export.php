<?php

namespace Decalex\Traits\Customer;

use Comptech\Performers\Datatable\Export as ExportPerformer;

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
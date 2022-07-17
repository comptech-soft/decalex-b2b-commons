<?php

namespace B2B\Traits\Decalex\RegisterRow;

use B2B\Classes\Comptech\Performers\Datatable\Export as ExportPerformer;
use B2B\Models\Decalex\RegisterColumn;

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
            'exports.ropa-register.xls-export', 
            RegisterColumn::where('register_id', 1)->orderBy('order_no')->get()->toArray()
            
        ))->Perform();
    }

}
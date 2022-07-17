<?php

namespace B2B\Traits\Decalex\RegisterRow;

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
            'exports.ropa-register.xls-export', 
            \B2B\Models\Decalex\RegisterColumn::where('register_id', 1)->orderBy('order_no')->get()->toArray()
            
        ))->Perform();
    }

}
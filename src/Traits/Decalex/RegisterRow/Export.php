<?php

namespace Decalex\Traits\RegisterRow;

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
            \Decalex\Models\RegisterColumn::where('register_id', 1)->orderBy('order_no')->get()->toArray()
            
        ))->Perform();
    }

}
<?php

namespace B2B\Traits\Decalex\Centralizator;

use B2B\Classes\Comptech\Performers\Datatable\Export as ExportPerformer;

trait Export {

    public static $exportedColumns = [
        'id' => [
            'caption' => '#ID',
        ],
    ];

    public static function export($input) {

        $centralizator = self::where('id', $input['centralizator']['id'])->with(['columns'])->first();
 
        return (new ExportPerformer(
            [
                ...$input,
                'centralizator' => $centralizator,
                'items' => $centralizator->columns,
            ], 
            __CLASS__, 
            'exports.centralizator.xls-export', 
            self::$exportedColumns
            
        ))->Perform();
    }

}
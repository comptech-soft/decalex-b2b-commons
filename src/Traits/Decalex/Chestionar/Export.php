<?php

namespace B2B\Traits\Decalex\Chestionar;

use B2B\Classes\Comptech\Performers\Datatable\Export as ExportPerformer;

trait Export {

    public static $exportedColumns = [
        'id' => [
            'caption' => '#ID',
        ],
    ];

    public static function export($input) {

        $chestionar = self::where('id', $input['chestionar']['id'])->first();
 
        return (new ExportPerformer(
            [
                ...$input,
                'chestionar' => $chestionar,
                'items' => $chestionar->intrebari,
            ], 
            __CLASS__, 
            'exports.chestionar.xls-export', 
            self::$exportedColumns
            
        ))->Perform();
    }

}
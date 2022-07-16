<?php

namespace Decalex\Traits\Chestionar;

use Comptech\Performers\Datatable\Export as ExportPerformer;

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
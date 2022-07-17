<?php

namespace B2B\Traits\Decalex\Registru;

use B2B\Classes\Comptech\Performers\Datatable\Export as ExportPerformer;

trait Export {

    public static $exportedColumns = [
        'id' => [
            'caption' => '#ID',
        ],
    ];

    public static function export($input) {

        $id = $input['customer_registru_id'];

        $registru = \B2B\Models\Decalex\CustomerRegister::where('id', $id)->with('register')->first();

        $header = \B2B\Models\Decalex\RegisterColumn::getHeaderByRegister($registru->register_id);

        $columns = \B2B\Models\Decalex\RegisterColumn::getColumnsFromHeader($header);

        $rows = \B2B\Models\Decalex\CustomerRegisterRow::prepareRowsByCustomerRegister($id, $columns);

        return (new ExportPerformer(
            [
                ...$input,
                'items' => [
                    'registru' => $registru,
                    'header' => $header,
                    'column_count' => count($columns),
                    'rows' => $rows,
                    'hasDepartamente' => $registru->register->props['hasDepartamente'] == '1',
                ]
            ], 
            __CLASS__, 
            'exports.registru.xls-export', 
            self::$exportedColumns
            
        ))->Perform();
    }

}
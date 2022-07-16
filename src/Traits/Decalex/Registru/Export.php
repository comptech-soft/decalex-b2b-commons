<?php

namespace Decalex\Traits\Registru;

use Comptech\Performers\Datatable\Export as ExportPerformer;

trait Export {

    public static $exportedColumns = [
        'id' => [
            'caption' => '#ID',
        ],
    ];

    public static function export($input) {

        $id = $input['customer_registru_id'];

        $registru = \Decalex\Models\CustomerRegister::where('id', $id)->with('register')->first();

        $header = \Decalex\Models\RegisterColumn::getHeaderByRegister($registru->register_id);

        $columns = \Decalex\Models\RegisterColumn::getColumnsFromHeader($header);

        $rows = \Decalex\Models\CustomerRegisterRow::prepareRowsByCustomerRegister($id, $columns);

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
<?php

namespace B2B\Traits\Decalex\Registru;

use B2B\Classes\Comptech\Performers\Datatable\Export as ExportPerformer;
use B2B\Models\Decalex\CustomerRegister;
use B2B\Models\Decalex\RegisterColumn;
use B2B\Models\Decalex\CustomerRegisterRow;

trait Export {

    public static $exportedColumns = [
        'id' => [
            'caption' => '#ID',
        ],
    ];

    public static function export($input) {

        $id = $input['customer_registru_id'];

        $registru = CustomerRegister::where('id', $id)->with('register')->first();

        $header = RegisterColumn::getHeaderByRegister($registru->register_id);

        $columns = RegisterColumn::getColumnsFromHeader($header);

        $rows = CustomerRegisterRow::prepareRowsByCustomerRegister($id, $columns);

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
            'decalex-b2b-commons::exports.registru.xls-export', 
            self::$exportedColumns
            
        ))->Perform();
    }

}
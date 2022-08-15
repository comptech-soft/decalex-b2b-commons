<?php

namespace B2B\Traits\Decalex\Trimitere;

use B2B\Classes\Comptech\Performers\Datatable\GetItems;

trait GetTrimiteri {

    /**  Get items */
    public static function getItems($input) {
        return (new GetItems($input, self::query()->with(['detalii.customer']), __CLASS__))->Perform();
    }

    public static function getNextNumber($type) {
        $records = \DB::select("
            SELECT 
                MAX(CAST(`number` AS UNSIGNED)) as max_number 
            FROM `trimiteri` 
            WHERE type='" . $type . "'"
        );
        return number_format(1 + $records[0]->max_number, 0, '', '');
    }

}
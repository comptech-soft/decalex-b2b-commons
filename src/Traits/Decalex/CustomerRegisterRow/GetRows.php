<?php

namespace B2B\Traits\Decalex\CustomerRegisterRow;

use Comptech\Performers\Datatable\GetItems;

trait GetRows {

    public static function getItems($input) {
        return (new GetItems($input, self::query()->with(['values', 'departament']), __CLASS__))->Perform();
    }

    public static function prepareRowsByCustomerRegister($customer_register_id, $columns) {

        $rows = self::where('customer_register_id', $customer_register_id)->with(['values', 'departament'])->get()->sortBy('order_no')->toArray();

        $r = [];

        foreach($rows as $i => $row)
        {
            $cols = [
                'departament' => $row['departament']['departament'],
                ...$columns,
            ];

            foreach($row['values'] as $j => $item)
            {
                $cols['#' . $item['column_id']] = $item['value'];
            }

            $r[] = $cols;
        }
        
        return $r;
    }

}
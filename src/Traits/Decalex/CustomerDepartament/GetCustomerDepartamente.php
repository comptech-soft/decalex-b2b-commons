<?php

namespace B2B\Traits\Decalex\CustomerDepartament;

use Comptech\Performers\Datatable\GetItems;

trait GetCustomerDepartamente {

    public static function getQuery()
    {
        return 
            self::query()
        ;
    }

    public static function getItems($input) {
        return (new GetItems($input, self::getQuery(), __CLASS__))->Perform();
    }

    public static function getOrCreate($departament, $customer_id) {
        $record = self::where('departament', $departament)->where('customer_id', $customer_id)->first();

        if( ! $record )
        {
            $record = self::create([
                'departament' => $departament,
                'customer_id' => $customer_id,
                'created_by' => \Sentinel::check()->id,
            ]);
        }

        return $record;
    }

}
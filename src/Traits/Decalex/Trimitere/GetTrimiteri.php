<?php

namespace B2B\Traits\Decalex\Trimitere;

use B2B\Classes\Comptech\Performers\Datatable\GetItems;

trait GetTrimiteri {

    /**  Get items */
    public static function getQuery()
    {
        return 
            self::query()
            // ->leftJoin(
            //     'customers',
            //     function($j) {
            //         $j->on('customers.id', '=', 'customers-contracts.customer_id');
            //     }
            // )
            // ->select('customers-contracts.*')
        ;
    }

    /**  Get items */
    public static function getItems($input) {
        return (new GetItems($input, self::getQuery()->with(['detalii.customer']), __CLASS__))->Perform();
    }

}
<?php

namespace B2B\Traits\Decalex\CustomerContract;

use Comptech\Performers\Datatable\GetItems;

trait GetContracts {

    /**  Get items */
    public static function getQuery()
    {
        return 
            self::query()
            ->leftJoin(
                'customers',
                function($j) {
                    $j->on('customers.id', '=', 'customers-contracts.customer_id');
                }
            )
            ->select('customers-contracts.*')
        ;
    }

    /**  Get items */
    public static function getItems($input) {
        return (new GetItems($input, self::getQuery()->with(['customer', 'orders.services.service']), __CLASS__))->Perform();
    }

}
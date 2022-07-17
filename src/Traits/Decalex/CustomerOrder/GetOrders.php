<?php

namespace B2B\Traits\Decalex\CustomerOrder;

use Comptech\Performers\Datatable\GetItems;

trait GetOrders {

    /**  Get items */
    public static function getQuery()
    {
        return 
            self::query()
            ->leftJoin(
                'customers',
                function($j) {
                    $j->on('customers.id', '=', 'customers-orders.customer_id');
                }
            )
            ->leftJoin(
				'customers-contracts',
				function($j) {
					$j->on('customers-contracts.id', '=', 'customers-orders.contract_id');
				}
            )
            ->select('customers-orders.*')
        ;
    }

    /**  Get items */
    public static function getItems($input) {
        return (new GetItems($input, self::getQuery()->with(['customer', 'contract', 'services.service']), __CLASS__))->Perform();
    }

}
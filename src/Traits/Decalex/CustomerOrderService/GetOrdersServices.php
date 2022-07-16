<?php

namespace Decalex\Traits\CustomerOrderService;

use Comptech\Performers\Datatable\GetItems;

trait GetOrdersServices {

    /**  Get items */
    public static function getQuery()
    {
        return 
            self::query()
            ->leftJoin(
                'services',
                function($j) {
                    $j->on('services.id', '=', 'customers-orders-services.service_id');
                }
            )
            ->leftJoin(
				'customers-orders',
				function($j) {
					$j->on('customers-orders.id', '=', 'customers-orders-services.order_id')
                    ->leftJoin(
                        'customers-contracts',
                        function($j) {
                            $j->on('customers-contracts.id', '=', 'customers-orders.contract_id');
                        }
                    )
                    ->leftJoin(
                        'customers',
                        function($j) {
                            $j->on('customers.id', '=', 'customers-orders.customer_id');
                        }
                    );
				}
            )
            ->select('customers-orders-services.*')
        ;
    }

    /**  Get items */
    public static function getItems($input) {
        return (new GetItems($input, self::getQuery()->with(['order.customer', 'order.contract', 'service']), __CLASS__))->Perform();
    }

}
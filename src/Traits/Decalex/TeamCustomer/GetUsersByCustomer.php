<?php

namespace Decalex\Traits\TeamCustomer;

use Comptech\Performers\Datatable\GetItems;

trait GetUsersByCustomer {

    /**  Get items */
    public static function getQuery()
    {
        return 
            self::query()
            // ->leftJoin(
            //     'customers',
            //     function($j) {
            //         $j->on('customers.id', '=', 'team-customers.customer_id');
            //     }
            // )
            // ->select('team-customers.*')
        ;
    }

    public static function getUsers($input) {
        return (new GetItems($input, self::getQuery()->with(['user']), __CLASS__))->Perform();
        
    }

}
<?php

namespace B2B\Traits\Decalex\CustomerPerson;

use B2B\Classes\Comptech\Performers\Datatable\GetItems;

trait GetCustomerPersons {

    /**  Get items */
    public static function getQuery()
    {
        return 
            self::query()
            ->leftJoin(
                'customers',
                function($j) {
                    $j->on('customers.id', '=', 'customers-persons.customer_id');
                }
            )
            ->leftJoin(
                'users',
                function($j) {
                    $j->on('users.id', '=', 'customers-persons.user_id');
                }
            )
            ->select('customers-persons.*')
        ;
    }

    /**  Get items */
    public static function getItems($input) {
        return (new GetItems($input, self::getQuery()->with(['user.roles', 'customer']), __CLASS__))->Perform();
    }

}
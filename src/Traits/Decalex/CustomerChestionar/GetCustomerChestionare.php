<?php

namespace B2B\Traits\Decalex\CustomerChestionar;

use Comptech\Performers\Datatable\GetItems;

trait GetCustomerChestionare {

    public static function getQuery()
    {
        return 
            self::query()
            ->select('customers-chestionare.*')
        ;
    }

    public static function getItems($input) {
        return (new GetItems($input, self::getQuery()->with(['chestionar', 'trimitere']), __CLASS__))->Perform();
    }

}
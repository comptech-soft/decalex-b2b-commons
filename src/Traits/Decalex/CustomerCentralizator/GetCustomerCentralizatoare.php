<?php

namespace B2B\Traits\Decalex\CustomerCentralizator;

use B2B\Classes\Comptech\Performers\Datatable\GetItems;

trait GetCustomerCentralizatoare {

    public static function getQuery()
    {
        return 
            self::query()
            ->select('customers-centralizatoare.*')
        ;
    }

    public static function getItems($input) {
        return (new GetItems($input, self::getQuery()->with(['centralizator', 'trimitere']), __CLASS__))->Perform();
    }

}
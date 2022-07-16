<?php

namespace Decalex\Traits\CustomerCentralizator;

use Comptech\Performers\Datatable\GetItems;

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
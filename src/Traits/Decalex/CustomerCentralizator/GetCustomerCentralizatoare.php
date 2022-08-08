<?php

namespace B2B\Traits\Decalex\CustomerCentralizator;

use B2B\Classes\Comptech\Performers\Datatable\GetItems;
use B2B\Performers\Decalex\CustomerCentralizator\GetSummaries;

trait GetCustomerCentralizatoare {

    public static function getQuery() {
        return 
            self::query()
            ->select('customers-centralizatoare.*')
        ;
    }

    public static function getItems($input) {
        return (new GetItems($input, self::getQuery()->with(['centralizator', 'trimitere']), __CLASS__))->Perform();
    }

    public static function getSummaries($input) {
        dd($input);
        return (new GetSummaries($input))->Perform();
    }

}
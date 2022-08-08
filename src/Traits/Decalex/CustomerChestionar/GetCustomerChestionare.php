<?php

namespace B2B\Traits\Decalex\CustomerChestionar;

use B2B\Classes\Comptech\Performers\Datatable\GetItems;
use B2B\Performers\Decalex\CustomerChestonar\GetSummaries;

trait GetCustomerChestionare {

    public static function getQuery() {
        return 
            self::query()
            ->select('customers-chestionare.*')
        ;
    }

    public static function getItems($input) {
        return (new GetItems($input, self::getQuery()->with(['chestionar', 'trimitere']), __CLASS__))->Perform();
    }

    public static function getSummaries($input) {
        return (new GetSummaries($input))->Perform();
    }

}
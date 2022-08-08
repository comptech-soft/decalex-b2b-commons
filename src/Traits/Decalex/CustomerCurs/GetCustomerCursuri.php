<?php

namespace B2B\Traits\Decalex\CustomerCurs;

use B2B\Classes\Comptech\Performers\Datatable\GetItems;
use B2B\Performers\Decalex\CustomerCurs\GetSummaries;

trait GetCustomerCursuri {

    public static function getQuery() {
        return 
            self::query()
            ->select('customers-cursuri.*')
        ;
    }

    public static function getItems($input) {
        return (new GetItems($input, self::getQuery()->with(['curs', 'trimitere', 'participanti']), __CLASS__))->Perform();
    }

    public static function getSummaries($input) {
        return (new GetSummaries($input))->Perform();
    }

}
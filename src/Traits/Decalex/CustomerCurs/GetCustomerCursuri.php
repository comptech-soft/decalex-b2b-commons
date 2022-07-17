<?php

namespace B2B\Traits\Decalex\CustomerCurs;

use Comptech\Performers\Datatable\GetItems;

trait GetCustomerCursuri {

    public static function getQuery()
    {
        return 
            self::query()
            ->select('customers-cursuri.*')
        ;
    }

    public static function getItems($input) {
        return (new GetItems($input, self::getQuery()->with(['curs', 'trimitere', 'participanti']), __CLASS__))->Perform();
    }

}
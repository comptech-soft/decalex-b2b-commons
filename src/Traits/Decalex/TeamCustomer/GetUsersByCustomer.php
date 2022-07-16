<?php

namespace B2B\Traits\Decalex\TeamCustomer;

use B2B\Classes\Comptech\Performers\Datatable\GetItems;

trait GetUsersByCustomer {

    public static function getUsers($input) {
        return (new GetItems($input, self::query()->with(['user']), __CLASS__))->Perform();
        
    }

}
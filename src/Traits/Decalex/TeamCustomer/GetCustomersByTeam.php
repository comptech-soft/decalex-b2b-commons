<?php

namespace B2B\Traits\Decalex\TeamCustomer;

use B2B\Performers\Decalex\TeamCustomer\GetCustomersItems;

trait GetCustomersByTeam {

    public static function getItems($input) {
        return (new GetCustomersItems($input, self::query(), __CLASS__))->Perform();
        
    }

}
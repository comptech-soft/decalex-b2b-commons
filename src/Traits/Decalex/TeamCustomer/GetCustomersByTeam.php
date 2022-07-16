<?php

namespace Decalex\Traits\TeamCustomer;

use Decalex\Performers\TeamCustomer\GetCustomersItems;

trait GetCustomersByTeam {

    public static function getItems($input) {
        return (new GetCustomersItems($input, self::query(), __CLASS__))->Perform();
        
    }

}
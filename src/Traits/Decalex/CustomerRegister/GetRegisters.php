<?php

namespace B2B\Traits\Decalex\CustomerRegister;

use B2B\Classes\Comptech\Performers\Datatable\GetItems;
use B2B\Performers\Decalex\CustomerRegister\GetSummaries;

trait GetRegisters {

    /**  Get items */
    public static function getQuery() {
        return 
            self::query();
    }

    /**  Get items */
    public static function getItems($input) {
        return (new GetItems($input, self::getQuery(), __CLASS__))->Perform();
    }

    public static function getSummaries($input) {
        return (new GetSummaries($input))->Perform();
    }

}
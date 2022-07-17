<?php

namespace System\Traits\City;

use B2B\Classes\Comptech\Performers\Datatable\GetItems;

trait GetCities {


    /**  Get items */
    public static function getItems($input) {
        return (new GetItems($input, self::query(), __CLASS__))->Perform();
    }



}
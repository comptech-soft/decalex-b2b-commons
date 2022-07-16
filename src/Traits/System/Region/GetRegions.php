<?php

namespace System\Traits\Region;

use Comptech\Performers\Datatable\GetItems;

trait GetRegions {


    /**  Get items */
    public static function getItems($input) {
        return (new GetItems($input, self::query()->withCount(['cities']), __CLASS__))->Perform();
    }


}
<?php

namespace B2B\Traits\System\Region;

use B2B\Classes\Comptech\Performers\Datatable\GetItems;

trait GetRegions {


    /**  Get items */
    public static function getItems($input) {
        return (new GetItems($input, self::query()->withCount(['cities']), __CLASS__))->Perform();
    }


}
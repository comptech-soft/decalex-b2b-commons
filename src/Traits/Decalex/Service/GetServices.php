<?php

namespace B2B\Traits\Decalex\Service;

use B2B\Classes\Comptech\Performers\Datatable\GetItems;

trait GetServices {

    /**  Get items */
    public static function getItems($input) {
        return (new GetItems($input, self::query(), __CLASS__))->Perform();
    }

}
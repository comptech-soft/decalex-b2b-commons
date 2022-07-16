<?php

namespace Decalex\Traits\Service;

use Comptech\Performers\Datatable\GetItems;

trait GetServices {

    /**  Get items */
    public static function getItems($input) {
        return (new GetItems($input, self::query(), __CLASS__))->Perform();
    }

}
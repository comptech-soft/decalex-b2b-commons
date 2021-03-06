<?php

namespace B2B\Traits\Decalex\UserRaspuns;

use B2B\Classes\Comptech\Performers\Datatable\GetItems;

trait GetRaspunsuri {

    /**  Get items */
    public static function getQuery()
    {
        return 
            self::query()
        ;
    }

    // /**  Get items */
    public static function getItems($input) {
        return (new GetItems($input, self::getQuery()->with(['values']), __CLASS__))->Perform();
    }

}
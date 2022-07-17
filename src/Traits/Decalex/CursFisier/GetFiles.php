<?php

namespace B2B\Traits\Decalex\CursFisier;

use Comptech\Performers\Datatable\GetItems;

trait GetFiles {

    /**  Get items */
    public static function getItems($input) {
        return (new GetItems(
            $input, 
            self::query(), 
            __CLASS__
        ))->Perform();
    }

}
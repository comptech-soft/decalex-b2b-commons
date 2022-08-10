<?php

namespace B2B\Traits\Decalex\Intrebare;

use B2B\Classes\Comptech\Performers\Datatable\GetItems;

trait GetIntrebari {

    /**  Get items */
    public static function getItems($input) {
        return (new GetItems(
            $input, 
            self::query()->whereRaw('( (intrebari.deleted IS NULL) OR (intrebari.deleted = 0))'), 
            __CLASS__
        ))->Perform();
    }

}
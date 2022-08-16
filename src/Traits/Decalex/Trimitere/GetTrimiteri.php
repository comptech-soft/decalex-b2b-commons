<?php

namespace B2B\Traits\Decalex\Trimitere;

use B2B\Classes\Comptech\Performers\Datatable\GetItems;
use B2B\Performers\Decalex\Trimitere\GetNextNumber;

trait GetTrimiteri {

    /**  Get items */
    public static function getItems($input) {
        return (new GetItems($input, self::query()->with(['detalii.customer']), __CLASS__))->Perform();
    }


    public static function getNextNumber($type) {
        return (new GetNextNumber($type))->Perform();
    }
    
}
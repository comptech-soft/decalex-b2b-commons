<?php

namespace B2B\Traits\Decalex\Centralizator;

use Comptech\Performers\Datatable\GetItems;

trait GetCentralizatoare {

    public static function getItems($input) {
        return (new GetItems($input, self::query()->with(['category', 'columns']), __CLASS__))->Perform();
    }

}
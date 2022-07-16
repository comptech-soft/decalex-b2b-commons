<?php

namespace Decalex\Traits\Registru;

use Comptech\Performers\Datatable\GetItems;

trait GetRegisters {

    public static function getQuery() {
        return self::query()->where('deleted', 0);
    }

    public static function getItems($input) {
        return (new GetItems($input, self::getQuery()->with(['columns']), __CLASS__))->Perform();
    }

}
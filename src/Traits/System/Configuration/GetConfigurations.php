<?php

namespace B2B\Traits\System\Configuration;

use B2B\Classes\Comptech\Performers\Datatable\GetItems;

trait GetConfigurations {

    public static function getItems($input) {
        return (new GetItems($input, self::query(), __CLASS__))->Perform();
    }

}
<?php

namespace ComptechSoft\Decalex\Traits\System\Configuration;

use Comptech\Performers\Datatable\GetItems;

trait GetConfigurations {


    public static function getItems($input) {
        return (new GetItems($input, self::query(), __CLASS__))->Perform();
    }

}
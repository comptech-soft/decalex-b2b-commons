<?php

namespace B2B\Traits\Decalex\RegisterRow;

use Decalex\Performers\RegisterRow\GetRegisterRowItems;

trait GetRegisterRows {

    /**  Get items */
    public static function getItems($input) {
        return (new GetRegisterRowItems($input, self::query(), __CLASS__))->Perform();
    }

}
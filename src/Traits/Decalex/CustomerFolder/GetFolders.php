<?php

namespace B2B\Traits\Decalex\CustomerFolder;

use Comptech\Performers\Datatable\GetItems;

trait GetFolders {

    /**  Get items */
    public static function getItems($input) {
        return (new GetItems(
            $input, 
            self::query()->whereRaw('( (`customers-folders`.`deleted` IS NULL) OR (`customers-folders`.`deleted` = 0))'), 
            __CLASS__
        ))->Perform();
    }

}
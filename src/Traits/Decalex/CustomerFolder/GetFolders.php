<?php

namespace B2B\Traits\Decalex\CustomerFolder;

use B2B\Classes\Comptech\Performers\Datatable\GetItems;
use B2B\Performers\Decalex\CustomerFolder\GetSummaries;
use B2B\Performers\Decalex\CustomerFolder\GetAncestors;

trait GetFolders {

    /**  Get items */
    public static function getItems($input) {
        return (new GetItems(
            $input, 
            self::query()->whereRaw('( (`customers-folders`.`deleted` IS NULL) OR (`customers-folders`.`deleted` = 0))'), 
            __CLASS__
        ))->Perform();
    }

    public static function getAncestors($input) {
        return (new GetAncestors($input))->Perform();
    }

    public static function getSummaries($input) {
        return (new GetSummaries($input))->Perform();
    }

}
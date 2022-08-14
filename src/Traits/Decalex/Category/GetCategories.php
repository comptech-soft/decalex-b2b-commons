<?php

namespace B2B\Traits\Decalex\Category;

use B2B\Classes\Comptech\Performers\Datatable\GetItems;

trait GetCategories {

    public static function getItems($input, $type = NULL) {
        if(! $type )
        {
            return (new GetItems($input, self::query(), __CLASS__))->Perform();
        }

        return (new GetItems(
            $input, 
            self::query()->where('type', $type)->withCount($type), 
            __CLASS__
        ))->Perform();
    }

}
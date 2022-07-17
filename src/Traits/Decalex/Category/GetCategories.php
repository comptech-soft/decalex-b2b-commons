<?php

namespace B2B\Traits\Decalex\Category;

use B2B\Classes\Comptech\Performers\Datatable\GetItems;

trait GetCategories {

    public static function getItems($input) {
        return (new GetItems($input, self::query(), __CLASS__))->Perform();
    }

}
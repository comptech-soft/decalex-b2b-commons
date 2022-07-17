<?php

namespace B2B\Traits\Decalex\Chestionar;

use B2B\Classes\Comptech\Performers\Datatable\GetItems;

trait GetChestionare {

    /**  Get items */
    public static function getQuery() {

        return 
            self::query()
            ->leftJoin(
                'categories',
                function($j) {
                    $j->on('categories.id', '=', 'chestionare.category_id');
                }
            )
        ;
    }

    /**  Get items */
    public static function getItems($input) {
        return (new GetItems($input, self::getQuery(), __CLASS__))->Perform();
    }

}
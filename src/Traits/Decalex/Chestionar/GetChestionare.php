<?php

namespace Decalex\Traits\Chestionar;

use Comptech\Performers\Datatable\GetItems;

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
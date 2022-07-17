<?php

namespace B2B\Traits\Decalex\Curs;

use B2B\Classes\Comptech\Performers\Datatable\GetItems;

trait GetCursuri {

    public static function getQuery() {
        return 
            self::query()
            ->leftJoin(
                'categories',
                function($j) {
                    $j->on('categories.id', '=', 'educatie.category_id');
                }
            )
        ;
    }

    public static function getItems($input) {
        return (new GetItems($input, self::getQuery()->with(['customercursuri.trimitere.detalii.customer', 'customercursuri.participanti']), __CLASS__))->Perform();
    }

}
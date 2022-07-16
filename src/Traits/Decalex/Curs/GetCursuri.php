<?php

namespace Decalex\Traits\Curs;

use Comptech\Performers\Datatable\GetItems;

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
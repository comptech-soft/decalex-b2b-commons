<?php

namespace B2B\Traits\Cartalyst\User;

use B2B\Comptech\Classes\Performers\Datatable\GetItems;

trait GetUsers {

    public static function getItems($input) {
        return (new GetItems($input, self::query(), __CLASS__))->Perform();
    }
    
}
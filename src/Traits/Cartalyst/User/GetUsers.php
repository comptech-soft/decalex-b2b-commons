<?php

namespace Cartalyst\Traits\User;

use Comptech\Performers\Datatable\GetItems;

trait GetUsers {

    public static function getItems($input) {
        return (new GetItems($input, self::query(), __CLASS__))->Perform();
    }
    
}
<?php

namespace B2B\Traits\Cartalyst\Role;

use Comptech\Performers\Datatable\GetItems;

trait GetRoles {

    public static function getItems($input) {
        return (new GetItems($input, self::query()->withCount('users'), __CLASS__))->Perform();
    }
    
}
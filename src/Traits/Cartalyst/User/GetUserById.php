<?php

namespace Cartalyst\Traits\User;

trait GetUserById {

    public static function getUserById($id) {
        
        return self::find($id);
        
    }
}
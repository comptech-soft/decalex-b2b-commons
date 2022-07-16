<?php

namespace B2B\Traits\Cartalyst\User;

trait GetUserById {

    public static function getUserById($id) {
        
        return self::find($id);
        
    }
}
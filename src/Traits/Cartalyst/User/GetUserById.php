<?php

namespace ComptechSoft\Decalex\Traits\Cartalyst\User;

trait GetUserById {

    public static function getUserById($id) {
        
        return self::find($id);
        
    }
}
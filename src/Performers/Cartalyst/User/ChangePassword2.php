<?php

namespace ComptechSoft\Decalex\Performers\Cartalyst\User;

use ComptechSoft\Decalex\Classes\Comptech\Helpers\Perform;

class ChangePassword extends Perform {

    public function Action() {

        $user = \Sentinel::check();

        \Sentinel::update($user, [
            'password' => $this->input['password']
        ]);
        
    }
} 
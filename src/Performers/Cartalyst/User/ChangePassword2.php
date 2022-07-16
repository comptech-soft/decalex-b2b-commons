<?php

namespace B2B\Performers\Cartalyst\User;

use B2B\Classes\Comptech\Helpers\Perform;

class ChangePassword2 extends Perform {

    public function Action() {

        $user = \Sentinel::check();

        \Sentinel::update($user, [
            'password' => $this->input['password']
        ]);
        
    }
} 
<?php

namespace Comptech\Performers\Cartalyst\Users;

use Comptech\Helpers\Perform;

class ChangePassword extends Perform {

    public function Action() {

        $user = \Sentinel::check();

        \Sentinel::update($user, [
            'password' => $this->input['password']
        ]);
        
    }
} 
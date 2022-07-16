<?php

namespace Cartalyst\Performers\User;

use ComptechSoft\Decalex\Classes\Comptech\Helpers\Perform;

class ChangePassword extends Perform {

    public function Action() {

        $user = \Cartalyst\Models\User::find($this->input['id']);

        \Sentinel::update($user, [
            'password' => $this->input['password']
        ]);
        
    }
} 
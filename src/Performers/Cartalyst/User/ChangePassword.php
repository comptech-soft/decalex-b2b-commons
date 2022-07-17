<?php

namespace B2B\Performers\Cartalyst\User;

use B2B\Classes\Comptech\Helpers\Perform;

class ChangePassword extends Perform {

    public function Action() {

        $user = \B2B\Models\Cartalyst\User::find($this->input['id']);

        \Sentinel::update($user, [
            'password' => $this->input['password']
        ]);
        
    }
} 
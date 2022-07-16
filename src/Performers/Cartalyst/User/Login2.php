<?php

namespace Comptech\Performers\Cartalyst\Users;

use ComptechSoft\Decalex\Classes\Comptech\Helpers\Perform;

class Login extends Perform {

    public function __construct($input, $rules, $messages = []) {
        parent::__construct($input, $rules, $messages);
        $this->IsBoolean(['remember_me']);
    }

    public function Action() {

        $credentials = [
            'email' => $this->input['email'], 
            'password' => $this->input['password']
        ];
        
        if( ! ($user = \Sentinel::authenticate($credentials, $this->input['remember_me'] )) )
        {
            throw new \Exception('These credentials do not match our records.');
        }

    }
} 
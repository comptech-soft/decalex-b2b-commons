<?php

namespace ComptechSoft\Decalex\Performers\Cartalyst\User;

use ComptechSoft\Decalex\Classes\Comptech\Helpers\Perform;

class Register extends Perform {

    public function __construct($input, $rules, $messages = []) {
        parent::__construct($input, $rules, $messages);
        $this->IsBoolean(['agree']);
    }

    public function Action() {

        $credentials = [
            'email' => $this->input['email'],
            'password' => $this->input['password'],
            'first_name' => $this->input['first_name'],
            'last_name' => $this->input['last_name'],
        ];

        if( $this->input['activate'])
        {
            $user = \Sentinel::registerAndActivate($credentials);
        }
        else
        {
            $user = \Sentinel::register($credentials);
            $activation = \Activation::create($user);
            \Mail::to($this->input['email'])->send(new \Comptech\Mails\Users\ActivateAccount($user, $activation));
        }

        $role = \Sentinel::findRoleById($this->input['role_id']);
        $role->users()->attach($user);
        
    }
} 
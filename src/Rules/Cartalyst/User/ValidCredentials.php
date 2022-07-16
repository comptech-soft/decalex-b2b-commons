<?php

namespace B2B\Rules\Cartalyst\User;

use Illuminate\Contracts\Validation\Rule;

class ValidCredentials implements Rule {

    public $password = NULL;
    public $message = NULL;
    public $user_id = NULL;

    public function __construct($password, $user_id = NULL)
    {
        $this->password = $password;
        $this->$user_id = $user_id;
    }

    public function passes($attribute, $value)
    {   
        if( ! $this->user_id )
        {
            $user = \Sentinel::check();
        }
        else
        {
            $user = \B2B\Models\Cartalyst\User::find($this->user_id);
        }
        
        $credentials = [
            'email'    => $user->email,
            'password' => $this->password,
        ];

        $valid = \Sentinel::validateCredentials($user, $credentials);

        if(! $valid )
        {
            $this->message = 'Nu este corectă.';
        }
        return $valid;
    }

    public function message()
    {
        return $this->message;
    }
}

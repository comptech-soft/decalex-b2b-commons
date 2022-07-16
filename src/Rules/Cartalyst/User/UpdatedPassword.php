<?php

namespace B2B\Rules\Cartalyst\User;

use Illuminate\Contracts\Validation\Rule;

class UpdatedPassword implements Rule {

    public $password = NULL;
    public $password_confirmation = NULL;

    public function __construct($password, $password_confirmation)
    {
        $this->password = $password;
        $this->password_confirmation = $password_confirmation;
    }

    public function passes($attribute, $value)
    {
        if( ! $this->password )
        {
            return true;
        }
        return $this->password === $this->password_confirmation;
    }

    public function message()
    {
        return 'Invalid confirmation password';
    }
}

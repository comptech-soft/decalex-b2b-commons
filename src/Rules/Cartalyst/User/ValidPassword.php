<?php

namespace Cartalyst\Rules\User;

use Illuminate\Contracts\Validation\Rule;

class ValidPassword implements Rule {

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

        
        if( strlen($this->password) < 8)
        {
            $this->message = 'Parola trebuie să conțină cel puțin 8 caractere.';
            return FALSE;
        }

        $maj = $min = $cif = $spec = 0;
        for($i = 0; $i < strlen($this->password); $i++)
        {
            $c = $this->password[$i];
            if( ($c >= 'A') && ($c <= 'Z'))
            { 
                $maj++;
            }
            else
            {
                if( ($c >= 'a') && ($c <= 'z'))
                { 
                    $min++;
                }
                else
                {
                    if( ($c >= '0') && ($c <= '9'))
                    { 
                        $cif++;
                    }
                    else
                    {
                        $spec++;
                    }
                }
            }
        }
        if($maj * $min * $cif * $spec == 0)
        {
            $this->message = 'The password must contain uppercase and lowercase letters, numbers and special characters.';
            return FALSE;
        }

        if( ! $this->user_id )
        {
            $user = \Sentinel::check();
        }
        else
        {
            $user = \Cartalyst\Models\User::find($this->user_id);
        }
        
        $valid = TRUE;
        
        if($user)
        {
            $credentials = [
                'email'    => $user->email,
                'password' => $this->password,
            ];

            $valid = \Sentinel::validForCreation($credentials);


            if(! $valid )
            {
                $this->message = 'Invalid credentials.';
            }
        }

        return $valid;
    }

    public function message()
    {
        return $this->message;
    }
}

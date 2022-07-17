<?php

namespace B2B\Rules\Decalex\CustomerPerson;

use Illuminate\Contracts\Validation\Rule;
use B2B\Models\Cartalyst\User;
use B2B\Models\Decalex\CustomerPerson as Person;

class CustomerPerson implements Rule {

    public $input = NULL;
    public $user = NULL;
    public $message = '';

    public function __construct($input)
    {
        $this->input = $input;
    }

    public function passes($attribute, $value)
    {   
        $q = User::where('id', $this->input['user']['id'])->where('type', 'b2b')->first();

        $this->user = $q->first();

        if(! $this->user)
        {
            $this->message = 'Utilizatorul nu pare a fi un utilizator B2B.';
            return FALSE;
        }

        $person = Person::where('user_id', $this->input['user']['id'])->where('customer_id', $this->input['customer_id'])->first();

        if($person)
        {
            $this->message = 'Utilizatorul este deja asociat clientului';
            return FALSE;
        }

        return TRUE;
    }

    public function message()
    {
        return $this->message;
    }
}

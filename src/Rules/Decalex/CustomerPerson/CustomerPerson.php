<?php

namespace Decalex\Rules\CustomerPerson;

use Illuminate\Contracts\Validation\Rule;

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
        $q = \B2B\Models\Cartalyst\User::where('id', $this->input['user']['id'])->where('type', 'b2b')->first();

        // if($this->input['id'])
        // {
        //     $q->where('id', '<>', $this->input['id']);
        // }

        $this->user = $q->first();

        if(! $this->user)
        {
            $this->message = 'Utilizatorul nu pare a fi un utilizator B2B.';
            return FALSE;
        }

        $person = \Decalex\Models\CustomerPerson::where('user_id', $this->input['user']['id'])->where('customer_id', $this->input['customer_id'])->first();

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

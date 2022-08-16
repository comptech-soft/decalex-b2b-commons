<?php

namespace B2B\Rules\Decalex\Trimitere;

use Illuminate\Contracts\Validation\Rule;
use B2B\Models\Decalex\Trimitere;

class ValidNumber implements Rule {

    public $input = NULL;
    public $record = NULL;

    public function __construct($input) {
        $this->input = $input;
    }

    public function passes($attribute, $value) {   
        $q = Trimitere::where('number', $this->input['number'])->where('type', $this->input['type']);

        if(array_key_exists('id', $this->input) && $this->input['id'])
        {
            $q->where('id', '<>', $this->input['id']);
        }

        $this->record = $q->first();

        if($this->record)
        {
            return FALSE;
        }
        
        return TRUE;
    }

    public function message()
    {
        return 'Trimiterea numărul ' . $this->input['number'] . ' este deja înregistrată.';
    }
}

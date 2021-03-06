<?php

namespace B2B\Rules\Decalex\CustomerDepartment;

use Illuminate\Contracts\Validation\Rule;
use B2B\Models\Decalex\CustomerDepartament;

class UniqueName implements Rule {

    public $input = NULL;
    public $record = NULL;

    public function __construct($input) {
        $this->input = $input;
    }

    public function passes($attribute, $value) {   

        $q = CustomerDepartament::where('departament', $this->input['departament'])->where('customer_id', $this->input['customer_id']);

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
        return 'Departamentul (' . $this->input['departament'] . ') este deja definit.';
    }
}

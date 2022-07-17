<?php

namespace Decalex\Rules\CustomerContract;

use Illuminate\Contracts\Validation\Rule;
use B2B\Models\Decalex\CustomerContract;

class ContractNumber implements Rule {

    public $input = NULL;
    public $contract = NULL;

    public function __construct($input)
    {
        $this->input = $input;
    }

    public function passes($attribute, $value)
    {   
        $q = CustomerContract::where('number', $this->input['number']); //->where('customer_id', $this->input['customer_id']);

        if(array_key_exists('id', $this->input) && $this->input['id'])
        {
            $q->where('id', '<>', $this->input['id']);
        }

        $this->contract = $q->first();

        if($this->contract)
        {
            return FALSE;
        }
        
        return TRUE;
    }

    public function message()
    {
        return 'The contract number (' . $this->input['number'] . ') has already been taken (' . $this->contract->customer->name . ').';
    }
}

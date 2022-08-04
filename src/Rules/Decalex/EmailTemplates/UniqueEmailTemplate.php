<?php

namespace B2B\Rules\Decalex\EmailTemplates;

use Illuminate\Contracts\Validation\Rule;
use B2B\Models\Decalex\EmailTemplate;

class UniqueEmailTemplate implements Rule {

    public $input = NULL;
    public $record = NULL;

    public function __construct($input)
    {
        $this->input = $input;
    }

    public function passes($attribute, $value)
    {   
        $q = EmailTemplate::where('entity', $this->input['entity'])->where('action', $this->input['action']);

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
        return 'Șablonul #' . $this->input['entity'] . ' - ' . $this->input['action'] . ' este deja definit.';
    }
}

<?php

namespace System\Rules\Region;

use Illuminate\Contracts\Validation\Rule;
use B2B\Models\System\Region;

class ValidRegionCode implements Rule {

    public $code = NULL;
    public $country_id = NULL;
    public $id = NULL;

    public function __construct($code, $country_id, $id)
    {
        $this->code = $code;
        $this->country_id = $country_id;
        $this->id = $id;
    }

    public function passes($attribute, $value)
    {   
        if(! $this->code)
        {
            return TRUE;
        }
        $q = Region::where('country_id', $this->country_id)->where('code', $this->code);
        if($this->id)
        {
            $q->where('id', '<>', $this->id);
        }
        if($q->first())
        {
            return FALSE;
        }
        return TRUE;
    }

    public function message()
    {
        return 'The region code has already been taken.';
    }
}

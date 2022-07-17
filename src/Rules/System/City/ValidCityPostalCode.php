<?php

namespace B2B\Rules\System\City;

use Illuminate\Contracts\Validation\Rule;
use B2B\Models\System\City;

class ValidCityPostalCode implements Rule {

    public $postal_code = NULL;
    public $region_id = NULL;
    public $id = NULL;

    public function __construct($postal_code, $region_id, $id)
    {
        $this->postal_code = $postal_code;
        $this->region_id = $region_id;
        $this->id = $id;
    }

    public function passes($attribute, $value)
    {   
        if(! $this->postal_code)
        {
            return TRUE;
        }
        $q = City::where('region_id', $this->region_id)->where('postal_code', $this->postal_code);
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
        return 'The postal code #' . $this->postal_code . ' already been taken.';
    }
}

<?php

namespace System\Rules\City;

use Illuminate\Contracts\Validation\Rule;
use B2B\Models\System\City;

class ValidCityName implements Rule {

    public $name = NULL;
    public $region_id = NULL;
    public $id = NULL;

    public function __construct($name, $region_id, $id)
    {
        $this->name = $name;
        $this->region_id = $region_id;
        $this->id = $id;
    }

    public function passes($attribute, $value)
    {   
        $q = City::where('region_id', $this->region_id)->where('name', $this->name);
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
        return 'The city name has already been taken.';
    }
}

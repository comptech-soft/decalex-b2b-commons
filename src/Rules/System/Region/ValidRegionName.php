<?php

namespace B2B\Rules\System\Region;

use Illuminate\Contracts\Validation\Rule;
use B2B\Models\System\Region;

class ValidRegionName implements Rule {

    public $name = NULL;
    public $country_id = NULL;
    public $id = NULL;

    public function __construct($name, $country_id, $id)
    {
        $this->name = $name;
        $this->country_id = $country_id;
        $this->id = $id;
    }

    public function passes($attribute, $value)
    {   
        $q = Region::where('country_id', $this->country_id)->where('name', $this->name);
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
        return 'The region name has already been taken.';
    }
}

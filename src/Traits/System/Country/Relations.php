<?php

namespace System\Traits\Country;

trait Relations {

    /** country->regions */
    function regions() {
        return $this->hasMany(\System\Models\Region::class, 'country_id');
    }

}
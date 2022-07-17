<?php

namespace System\Traits\Country;

trait Relations {

    /** country->regions */
    function regions() {
        return $this->hasMany(\B2B\Models\System\Region::class, 'country_id');
    }

}
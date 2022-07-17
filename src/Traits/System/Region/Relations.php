<?php

namespace B2B\Traits\System\Region;

use B2B\Models\System\Country;
use B2B\Models\System\City;

trait Relations {

    public function country() {
        return $this->belongsTo(Country::class, 'country_id');
    }

    function cities() {
        return $this->hasMany(City::class, 'region_id');
    }

}
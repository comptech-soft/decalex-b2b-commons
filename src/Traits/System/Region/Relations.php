<?php

namespace B2B\Traits\System\Region;

trait Relations {

    /** region->country  */
    public function country() {
        return $this->belongsTo(\B2B\Models\System\Country::class, 'country_id');
    }

    /** region->cities */
    function cities() {
        return $this->hasMany(\B2B\Models\System\City::class, 'region_id');
    }

}
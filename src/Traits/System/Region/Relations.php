<?php

namespace System\Traits\Region;

trait Relations {

    /** region->country  */
    public function country() {
        return $this->belongsTo(\System\Models\Country::class, 'country_id');
    }

    /** region->cities */
    function cities() {
        return $this->hasMany(\System\Models\City::class, 'region_id');
    }

}
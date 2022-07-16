<?php

namespace System\Traits\City;

trait Relations {

    /** city->region  */
    public function region() {
        return $this->belongsTo(\System\Models\Region::class, 'region_id');
    }

    

}
<?php

namespace B2B\Traits\System\City;

trait Relations {

    /** city->region  */
    public function region() {
        return $this->belongsTo(\B2B\Models\System\Region::class, 'region_id');
    }

    

}
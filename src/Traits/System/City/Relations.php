<?php

namespace B2B\Traits\System\City;

use B2B\Models\System\Region;

trait Relations {

    public function region() {
        return $this->belongsTo(Region::class, 'region_id');
    }

}
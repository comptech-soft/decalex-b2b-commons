<?php

namespace B2B\Traits\System\Country;

use B2B\Models\System\Region;

trait Relations {

    function regions() {
        return $this->hasMany(Region::class, 'country_id');
    }

}
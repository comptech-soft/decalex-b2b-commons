<?php

namespace B2B\Traits\Decalex\UserRaspuns;

use B2B\Models\Decalex\UserRaspunsValue;

trait Relations {

    function values() {
        return $this->hasMany(UserRaspunsValue::class, 'raspuns_id');
    }

}
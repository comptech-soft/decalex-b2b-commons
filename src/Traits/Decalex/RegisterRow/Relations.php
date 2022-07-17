<?php

namespace B2B\Traits\Decalex\RegisterRow;

use B2B\Models\Decalex\RegisterRowValue;

trait Relations {

    function values() {
        return $this->hasMany(RegisterRowValue::class, 'row_id');
    }
    
}
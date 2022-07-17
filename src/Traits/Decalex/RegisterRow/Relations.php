<?php

namespace B2B\Traits\Decalex\RegisterRow;

trait Relations {

    /** row->row-values */
    function values() {
        return $this->hasMany(\B2B\Models\Decalex\RegisterRowValue::class, 'row_id');
    }
    
}
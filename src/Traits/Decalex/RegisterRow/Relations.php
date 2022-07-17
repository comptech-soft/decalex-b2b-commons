<?php

namespace B2B\Traits\Decalex\RegisterRow;

trait Relations {

    /** row->row-values */
    function values() {
        return $this->hasMany(\Decalex\Models\RegisterRowValue::class, 'row_id');
    }
    
}
<?php

namespace Decalex\Traits\RegisterRow;

trait Relations {

    /** row->row-values */
    function values() {
        return $this->hasMany(\Decalex\Models\RegisterRowValue::class, 'row_id');
    }
    
}
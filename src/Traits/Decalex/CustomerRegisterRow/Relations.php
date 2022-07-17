<?php

namespace B2B\Traits\Decalex\CustomerRegisterRow;

use B2B\Models\Decalex\CustomerDepartament;
use B2B\Models\Decalex\CustomerRegisterRowValue;

trait Relations {

    function values() {
        return $this->hasMany(CustomerRegisterRowValue::class, 'row_id')->where('deleted', 0);
    }
    
    function departament() {
        return $this->belongsTo(CustomerDepartament::class, 'departament_id');
    }
}
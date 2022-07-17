<?php

namespace B2B\Traits\Decalex\CustomerRegisterRow;

trait Relations {

    function values() {
        return $this->hasMany(\B2B\Models\Decalex\CustomerRegisterRowValue::class, 'row_id')->where('deleted', 0);
    }
    
    function departament() {
        return $this->belongsTo(\B2B\Models\Decalex\CustomerDepartament::class, 'departament_id');
    }
}
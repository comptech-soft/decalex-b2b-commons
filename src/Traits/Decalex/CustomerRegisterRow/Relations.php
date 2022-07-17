<?php

namespace B2B\Traits\Decalex\CustomerRegisterRow;

trait Relations {

    function values() {
        return $this->hasMany(\Decalex\Models\CustomerRegisterRowValue::class, 'row_id')->where('deleted', 0);
    }
    
    function departament() {
        return $this->belongsTo(\Decalex\Models\CustomerDepartament::class, 'departament_id');
    }
}
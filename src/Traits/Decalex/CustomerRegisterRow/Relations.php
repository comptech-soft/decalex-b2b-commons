<?php

namespace Decalex\Traits\CustomerRegisterRow;

trait Relations {

    function values() {
        return $this->hasMany(\Decalex\Models\CustomerRegisterRowValue::class, 'row_id')->where('deleted', 0);
    }
    
    function departament() {
        return $this->belongsTo(\Decalex\Models\CustomerDepartament::class, 'departament_id');
    }
}
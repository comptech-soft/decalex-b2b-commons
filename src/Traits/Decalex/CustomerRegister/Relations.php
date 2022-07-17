<?php

namespace B2B\Traits\Decalex\CustomerRegister;

trait Relations {

    /** registru->rows */
    function rows() {
        return $this->hasMany(\B2B\Models\Decalex\CustomerRegisterRow::class, 'customer_register_id')->orderBy('order_no', 'asc');
    }
    
    /** registru->register */
    public function register() {
        return $this->belongsTo(\B2B\Models\Decalex\Registru::class, 'register_id');
    }
    
}
<?php

namespace B2B\Traits\Decalex\CustomerRegister;

trait Relations {

    /** registru->rows */
    function rows() {
        return $this->hasMany(\Decalex\Models\CustomerRegisterRow::class, 'customer_register_id')->orderBy('order_no', 'asc');
    }
    
    /** registru->register */
    public function register() {
        return $this->belongsTo(\Decalex\Models\Registru::class, 'register_id');
    }
    
}
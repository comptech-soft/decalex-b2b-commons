<?php

namespace B2B\Traits\Decalex\CustomerRegister;

use B2B\Models\Decalex\CustomerRegisterRow;
use B2B\Models\Decalex\Registru;

trait Relations {

    /** registru->rows */
    function rows() {
        return $this->hasMany(CustomerRegisterRow::class, 'customer_register_id')->orderBy('order_no', 'asc');
    }
    
    /** registru->register */
    public function register() {
        return $this->belongsTo(Registru::class, 'register_id');
    }
    
}
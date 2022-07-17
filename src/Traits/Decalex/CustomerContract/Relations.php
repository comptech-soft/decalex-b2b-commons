<?php

namespace B2B\Traits\Decalex\CustomerContract;

trait Relations {

    /** contracts->orders */
    function orders() {
        return $this->hasMany(\B2B\Models\Decalex\CustomerOrder::class, 'contract_id')->orderBy('date', 'desc');
    }
    
    /** contract->customer */
    public function customer() {
        return $this->belongsTo(\B2B\Models\Decalex\Customer::class, 'customer_id');
    }
    
}
<?php

namespace Decalex\Traits\CustomerContract;

trait Relations {

    /** contracts->orders */
    function orders() {
        return $this->hasMany(\Decalex\Models\CustomerOrder::class, 'contract_id')->orderBy('date', 'desc');
    }
    
    /** contract->customer */
    public function customer() {
        return $this->belongsTo(\Decalex\Models\Customer::class, 'customer_id');
    }
    
}
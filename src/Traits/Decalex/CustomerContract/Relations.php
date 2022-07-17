<?php

namespace B2B\Traits\Decalex\CustomerContract;

use B2B\Models\Decalex\Customer;
use B2B\Models\Decalex\CustomerOrder;

trait Relations {

    function orders() {
        return $this->hasMany(CustomerOrder::class, 'contract_id')->orderBy('date', 'desc');
    }
    
    public function customer() {
        return $this->belongsTo(Customer::class, 'customer_id');
    }
    
}
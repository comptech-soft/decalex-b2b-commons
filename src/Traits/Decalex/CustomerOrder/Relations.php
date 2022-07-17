<?php

namespace B2B\Traits\Decalex\CustomerOrder;

use B2B\Models\Decalex\Customer;
use B2B\Models\Decalex\CustomerContract;
use B2B\Models\Decalex\CustomerOrderService;

trait Relations {

    /** order->services */
    function services() {
        return $this->hasMany(CustomerOrderService::class, 'order_id');
    }
    
    /** order->customer */
    public function customer() {
        return $this->belongsTo(Customer::class, 'customer_id');
    }

    /** order->contract */
    public function contract() {
        return $this->belongsTo(CustomerContract::class, 'contract_id');
    }
    
}
<?php

namespace B2B\Traits\Decalex\CustomerOrderService;

use B2B\Models\Decalex\CustomerOrder;
use B2B\Models\Decalex\Service;

trait Relations {

    public function service() {
        return $this->belongsTo(Service::class, 'service_id');
    }

    public function order() {
        return $this->belongsTo(CustomerOrder::class, 'order_id');
    }
    
}
<?php

namespace B2B\Traits\Decalex\CustomerOrderService;

trait Relations {

    /** services->service  */
    public function service() {
        return $this->belongsTo(\B2B\Models\Decalex\Service::class, 'service_id');
    }

    /** services->order  */
    public function order() {
        return $this->belongsTo(\B2B\Models\Decalex\CustomerOrder::class, 'order_id');
    }
    
}
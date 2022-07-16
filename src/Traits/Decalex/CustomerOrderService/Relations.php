<?php

namespace Decalex\Traits\CustomerOrderService;

trait Relations {

    /** services->service  */
    public function service() {
        return $this->belongsTo(\Decalex\Models\Service::class, 'service_id');
    }

    /** services->order  */
    public function order() {
        return $this->belongsTo(\Decalex\Models\CustomerOrder::class, 'order_id');
    }
    
}
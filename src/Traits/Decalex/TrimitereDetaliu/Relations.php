<?php

namespace B2B\Traits\Decalex\TrimitereDetaliu;

use B2B\Models\Decalex\Customer;

trait Relations {

    public function customer() {
        return $this->belongsTo(Customer::class, 'customer_id');
    }
}
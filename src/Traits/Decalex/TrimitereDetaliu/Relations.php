<?php

namespace B2B\Traits\Decalex\TrimitereDetaliu;

trait Relations {

    public function customer() {
        return $this->belongsTo(\B2B\Models\Decalex\Customer::class, 'customer_id');
    }
}
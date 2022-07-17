<?php

namespace B2B\Traits\Decalex\TrimitereDetaliu;

trait Relations {

    public function customer() {
        return $this->belongsTo(\Decalex\Models\Customer::class, 'customer_id');
    }
}
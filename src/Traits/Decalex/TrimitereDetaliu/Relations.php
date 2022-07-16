<?php

namespace Decalex\Traits\TrimitereDetaliu;

trait Relations {

    public function customer() {
        return $this->belongsTo(\Decalex\Models\Customer::class, 'customer_id');
    }
}
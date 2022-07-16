<?php

namespace B2B\Traits\Decalex\TeamCustomer;

trait Relations {

    public function customer() {
        return $this->belongsTo(\B2B\Models\Decalex\Customer::class, 'customer_id');
    }

    public function user() {
        return $this->belongsTo(\B2B\Models\Cartalyst\User::class, 'user_id');
    }
    
}
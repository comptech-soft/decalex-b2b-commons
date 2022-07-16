<?php

namespace Decalex\Traits\TeamCustomer;

trait Relations {

    public function customer() {
        return $this->belongsTo(\Decalex\Models\Customer::class, 'customer_id');
    }

    public function user() {
        return $this->belongsTo(\Cartalyst\Models\User::class, 'user_id');
    }
    
}
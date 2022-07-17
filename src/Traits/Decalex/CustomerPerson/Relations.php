<?php

namespace B2B\Traits\Decalex\CustomerPerson;

trait Relations {

    /** person-user */
    public function user() {
        return $this->belongsTo(\B2B\Models\Cartalyst\User::class, 'user_id');
    }

    /** contract->customer */
    public function customer() {
        return $this->belongsTo(\Decalex\Models\Customer::class, 'customer_id');
    }
    
    
}
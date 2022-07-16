<?php

namespace Decalex\Traits\CustomerPerson;

trait Relations {

    /** person-user */
    public function user() {
        return $this->belongsTo(\Cartalyst\Models\User::class, 'user_id');
    }

    /** contract->customer */
    public function customer() {
        return $this->belongsTo(\Decalex\Models\Customer::class, 'customer_id');
    }
    
    
}
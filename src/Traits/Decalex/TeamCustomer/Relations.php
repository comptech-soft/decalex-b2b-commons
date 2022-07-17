<?php

namespace B2B\Traits\Decalex\TeamCustomer;

use B2B\Models\Cartalyst\User;
use B2B\Models\Decalex\Customer;

trait Relations {

    public function customer() {
        return $this->belongsTo(Customer::class, 'customer_id');
    }

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }
    
}
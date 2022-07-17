<?php

namespace B2B\Traits\Decalex\CustomerNotification;

use B2B\Models\Cartalyst\User;
use B2B\Models\Decalex\Customer;
use B2B\Models\Decalex\Notification;

trait Relations {

    public function sender() {
        return $this->belongsTo(User::class, 'sender_id');
    }
    
    public function type() {
        return $this->belongsTo(Notification::class, 'type_id');
    }
    
    public function customer() {
        return $this->belongsTo(Customer::class, 'customer_id');
    }
}
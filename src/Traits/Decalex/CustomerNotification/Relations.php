<?php

namespace B2B\Traits\Decalex\CustomerNotification;

trait Relations {

    public function sender() {
        return $this->belongsTo(\B2B\Models\Cartalyst\User::class, 'sender_id');
    }
    
    public function type() {
        return $this->belongsTo(\Decalex\Models\Notification::class, 'type_id');
    }
    
    public function customer() {
        return $this->belongsTo(\Decalex\Models\Customer::class, 'customer_id');
    }
}
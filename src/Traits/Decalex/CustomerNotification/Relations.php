<?php

namespace Decalex\Traits\CustomerNotification;

trait Relations {

    public function sender() {
        return $this->belongsTo(\Cartalyst\Models\User::class, 'sender_id');
    }
    
    public function type() {
        return $this->belongsTo(\Decalex\Models\Notification::class, 'type_id');
    }
    
    public function customer() {
        return $this->belongsTo(\Decalex\Models\Customer::class, 'customer_id');
    }
}
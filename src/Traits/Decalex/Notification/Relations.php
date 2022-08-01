<?php

namespace B2B\Traits\Decalex\Notification;

trait Relations {

    /**
     * Un anumit tip de notificare are mai multe notificari efectuate
     */
    public function notifications() {
        return $this->hasMany(\B2B\Models\Decalex\CustomerNotification::class, 'type_id');
    }
    
}
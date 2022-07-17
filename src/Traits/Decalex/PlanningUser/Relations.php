<?php

namespace B2B\Traits\Decalex\PlanningUser;

trait Relations {

    public function user() {
        return $this->belongsTo(\B2B\Models\Cartalyst\User::class, 'user_id');
    }

   
}
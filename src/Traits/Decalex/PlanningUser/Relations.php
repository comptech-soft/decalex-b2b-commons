<?php

namespace B2B\Traits\Decalex\PlanningUser;

trait Relations {

    public function user() {
        return $this->belongsTo(\Cartalyst\Models\User::class, 'user_id');
    }

   
}
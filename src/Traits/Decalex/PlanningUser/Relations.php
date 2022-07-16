<?php

namespace Decalex\Traits\PlanningUser;

trait Relations {

    public function user() {
        return $this->belongsTo(\Cartalyst\Models\User::class, 'user_id');
    }

   
}
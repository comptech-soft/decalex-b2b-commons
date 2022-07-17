<?php

namespace B2B\Traits\Decalex\PlanningUser;

use B2B\Models\Cartalyst\User;

trait Relations {

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }

   
}
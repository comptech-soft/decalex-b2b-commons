<?php

namespace Decalex\Traits\Registru;

trait Relations {

    /** coloanele registrului */
    function columns() {
        return $this->hasMany(\Decalex\Models\RegisterColumn::class, 'register_id');
    }
    
}
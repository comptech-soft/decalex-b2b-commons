<?php

namespace B2B\Traits\Decalex\Registru;

trait Relations {

    /** coloanele registrului */
    function columns() {
        return $this->hasMany(\Decalex\Models\RegisterColumn::class, 'register_id');
    }
    
}
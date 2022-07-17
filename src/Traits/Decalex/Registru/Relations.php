<?php

namespace B2B\Traits\Decalex\Registru;

trait Relations {

    /** coloanele registrului */
    function columns() {
        return $this->hasMany(\B2B\Models\Decalex\RegisterColumn::class, 'register_id');
    }
    
}
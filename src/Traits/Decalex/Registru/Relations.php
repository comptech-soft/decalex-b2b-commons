<?php

namespace B2B\Traits\Decalex\Registru;

use B2B\Models\Decalex\RegisterColumn;

trait Relations {

    function columns() {
        return $this->hasMany(RegisterColumn::class, 'register_id');
    }
    
}
<?php

namespace B2B\Traits\Decalex\RegisterColumn;

use B2B\Models\Decalex\RegisterColumn;

trait Relations {

    function parentgroup() {
        return $this->belongsTo(RegisterColumn::class, 'group_id');
    }
    
}
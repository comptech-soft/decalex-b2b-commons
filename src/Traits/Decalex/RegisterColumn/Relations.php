<?php

namespace B2B\Traits\Decalex\RegisterColumn;

trait Relations {

    function parentgroup() {
        return $this->belongsTo(\B2B\Models\Decalex\RegisterColumn::class, 'group_id');
    }
    
}
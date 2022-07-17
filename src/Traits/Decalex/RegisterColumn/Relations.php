<?php

namespace B2B\Traits\Decalex\RegisterColumn;

trait Relations {

    function parentgroup() {
        return $this->belongsTo(\Decalex\Models\RegisterColumn::class, 'group_id');
    }
    
}
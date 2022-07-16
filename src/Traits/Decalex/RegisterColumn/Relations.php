<?php

namespace Decalex\Traits\RegisterColumn;

trait Relations {

    function parentgroup() {
        return $this->belongsTo(\Decalex\Models\RegisterColumn::class, 'group_id');
    }
    
}
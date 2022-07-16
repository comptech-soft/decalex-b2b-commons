<?php

namespace Decalex\Traits\CustomerChestionar;

trait Relations {

    public function chestionar() {
        return $this->belongsTo(\Decalex\Models\Chestionar::class, 'chestionar_id');
    }

    public function trimitere() {
        return $this->belongsTo(\Decalex\Models\Trimitere::class, 'trimitere_id');
    }
    
}
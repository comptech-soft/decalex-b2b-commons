<?php

namespace B2B\Traits\Decalex\CustomerChestionar;

trait Relations {

    public function chestionar() {
        return $this->belongsTo(\B2B\Models\Decalex\Chestionar::class, 'chestionar_id');
    }

    public function trimitere() {
        return $this->belongsTo(\B2B\Models\Decalex\Trimitere::class, 'trimitere_id');
    }
    
}
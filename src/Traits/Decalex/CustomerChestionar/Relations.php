<?php

namespace B2B\Traits\Decalex\CustomerChestionar;

use B2B\Models\Decalex\Chestionar;
use B2B\Models\Decalex\Trimitere;

trait Relations {

    public function chestionar() {
        return $this->belongsTo(Chestionar::class, 'chestionar_id');
    }

    public function trimitere() {
        return $this->belongsTo(Trimitere::class, 'trimitere_id');
    }
    
}
<?php

namespace B2B\Traits\Decalex\CustomerCentralizator;

use B2B\Models\Decalex\Centralizator;
use B2B\Models\Decalex\Trimitere;

trait Relations {

    public function centralizator() {
        return $this->belongsTo(Centralizator::class, 'centralizator_id');
    }

    public function trimitere() {
        return $this->belongsTo(Trimitere::class, 'trimitere_id');
    }
    
}
<?php

namespace B2B\Traits\Decalex\CustomerCentralizator;

trait Relations {

    public function centralizator() {
        return $this->belongsTo(\B2B\Models\Decalex\Centralizator::class, 'centralizator_id');
    }

    public function trimitere() {
        return $this->belongsTo(\B2B\Models\Decalex\Trimitere::class, 'trimitere_id');
    }
    
}
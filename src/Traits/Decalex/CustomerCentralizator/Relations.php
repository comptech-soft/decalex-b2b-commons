<?php

namespace B2B\Traits\Decalex\CustomerCentralizator;

trait Relations {

    public function centralizator() {
        return $this->belongsTo(\Decalex\Models\Centralizator::class, 'centralizator_id');
    }

    public function trimitere() {
        return $this->belongsTo(\Decalex\Models\Trimitere::class, 'trimitere_id');
    }
    
}
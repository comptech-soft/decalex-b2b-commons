<?php

namespace B2B\Traits\Decalex\CustomerCurs;

trait Relations {

    public function curs() {
        return $this->belongsTo(\B2B\Models\Decalex\Curs::class, 'curs_id');
    }

    public function customer() {
        return $this->belongsTo(\B2B\Models\Decalex\Customer::class, 'customer_id');
    }

    public function trimitere() {
        return $this->belongsTo(\B2B\Models\Decalex\Trimitere::class, 'trimitere_id');
    }

    public function participanti() {
        return $this->hasMany(\B2B\Models\Decalex\ParticipantCurs::class, 'customer_curs_id');
    }
    
}
<?php

namespace B2B\Traits\Decalex\CustomerCurs;

trait Relations {

    public function curs() {
        return $this->belongsTo(\Decalex\Models\Curs::class, 'curs_id');
    }

    public function customer() {
        return $this->belongsTo(\Decalex\Models\Customer::class, 'customer_id');
    }

    public function trimitere() {
        return $this->belongsTo(\Decalex\Models\Trimitere::class, 'trimitere_id');
    }

    public function participanti() {
        return $this->hasMany(\Decalex\Models\ParticipantCurs::class, 'customer_curs_id');
    }
    
}
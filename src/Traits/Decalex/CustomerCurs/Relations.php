<?php

namespace B2B\Traits\Decalex\CustomerCurs;

use B2B\Models\Decalex\Curs;
use B2B\Models\Decalex\Customer;
use B2B\Models\Decalex\Trimitere;
use B2B\Models\Decalex\ParticipantCurs;

trait Relations {

    public function curs() {
        return $this->belongsTo(Curs::class, 'curs_id');
    }

    public function customer() {
        return $this->belongsTo(Customer::class, 'customer_id');
    }

    public function trimitere() {
        return $this->belongsTo(Trimitere::class, 'trimitere_id');
    }

    public function participanti() {
        return $this->hasMany(ParticipantCurs::class, 'customer_curs_id');
    }
    
}
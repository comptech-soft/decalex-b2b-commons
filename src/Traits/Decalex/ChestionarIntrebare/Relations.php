<?php

namespace B2B\Traits\Decalex\ChestionarIntrebare;

trait Relations {

    /** contracts->orders */
    function intrebare() {
        return $this->belongsTo(\B2B\Models\Decalex\Intrebare::class, 'intrebare_id');
    }
    
    // /** contract->customer */
    // public function customer() {
    //     return $this->belongsTo(\B2B\Models\Decalex\Customer::class, 'customer_id');
    // }
    
}
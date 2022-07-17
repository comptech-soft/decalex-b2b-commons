<?php

namespace B2B\Traits\Decalex\ChestionarIntrebare;

trait Relations {

    /** contracts->orders */
    function intrebare() {
        return $this->belongsTo(\Decalex\Models\Intrebare::class, 'intrebare_id');
    }
    
    // /** contract->customer */
    // public function customer() {
    //     return $this->belongsTo(\Decalex\Models\Customer::class, 'customer_id');
    // }
    
}
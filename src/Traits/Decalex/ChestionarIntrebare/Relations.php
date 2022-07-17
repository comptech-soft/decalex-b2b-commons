<?php

namespace B2B\Traits\Decalex\ChestionarIntrebare;

trait Relations {

    function intrebare() {
        return $this->belongsTo(\B2B\Models\Decalex\Intrebare::class, 'intrebare_id');
    }
    
   
}
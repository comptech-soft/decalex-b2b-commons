<?php

namespace B2B\Traits\Decalex\ChestionarIntrebare;

use B2B\Models\Decalex\Intrebare;

trait Relations {

    function intrebare() {
        return $this->belongsTo(Intrebare::class, 'intrebare_id');
    }
    
   
}
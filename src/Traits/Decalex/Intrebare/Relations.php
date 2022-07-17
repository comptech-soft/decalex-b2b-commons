<?php

namespace B2B\Traits\Decalex\Intrebare;

trait Relations {

    /** intrebare->raspunsuri */
    function raspunsuri() {
        return $this->hasMany(\B2B\Models\Decalex\IntrebareRaspuns::class, 'intrebare_id')->where('deleted', 0);
    }
    
    /** intrebare->tip */
    public function tip() {
        return $this->belongsTo(\B2B\Models\Decalex\TipIntrebare::class, 'tip_intrebare');
    }
    
}
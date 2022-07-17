<?php

namespace B2B\Traits\Decalex\Intrebare;

trait Relations {

    /** intrebare->raspunsuri */
    function raspunsuri() {
        return $this->hasMany(\Decalex\Models\IntrebareRaspuns::class, 'intrebare_id')->where('deleted', 0);
    }
    
    /** intrebare->tip */
    public function tip() {
        return $this->belongsTo(\Decalex\Models\TipIntrebare::class, 'tip_intrebare');
    }
    
}
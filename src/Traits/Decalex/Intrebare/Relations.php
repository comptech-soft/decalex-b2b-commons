<?php

namespace B2B\Traits\Decalex\Intrebare;

use B2B\Models\Decalex\IntrebareRaspuns;
use B2B\Models\Decalex\TipIntrebare;

trait Relations {

    /** intrebare->raspunsuri */
    function raspunsuri() {
        return $this->hasMany(IntrebareRaspuns::class, 'intrebare_id')->where('deleted', 0);
    }
    
    /** intrebare->tip */
    public function tip() {
        return $this->belongsTo(TipIntrebare::class, 'tip_intrebare');
    }
    
}
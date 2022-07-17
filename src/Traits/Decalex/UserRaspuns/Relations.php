<?php

namespace B2B\Traits\Decalex\UserRaspuns;

trait Relations {


    function values() {
        return $this->hasMany(\B2B\Models\Decalex\UserRaspunsValue::class, 'raspuns_id');
    }
    

    
}
<?php

namespace B2B\Traits\Decalex\UserRaspuns;

trait Relations {


    function values() {
        return $this->hasMany(\Decalex\Models\UserRaspunsValue::class, 'raspuns_id');
    }
    

    
}
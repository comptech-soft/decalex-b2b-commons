<?php

namespace Decalex\Traits\UserRaspuns;

trait Relations {


    function values() {
        return $this->hasMany(\Decalex\Models\UserRaspunsValue::class, 'raspuns_id');
    }
    

    
}
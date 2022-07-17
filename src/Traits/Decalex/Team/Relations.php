<?php

namespace B2B\Traits\Decalex\Team;

trait Relations {

    /** 
     * Team-customers - many to many 
     * CE CLIENTI ARE ATASATI UN OPERATOR DECALEX
     **/
    public function customers() {
        return $this
            ->belongsToMany(\B2B\Models\Decalex\Customer::class, 'team-customers', 'user_id', 'customer_id')
            ->withPivot('id', 'created_by', 'updated_by')
            ->withTimestamps();
    }
    
}
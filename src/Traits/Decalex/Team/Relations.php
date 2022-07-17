<?php

namespace B2B\Traits\Decalex\Team;

use B2B\Models\Decalex\Customer;

trait Relations {

    /** 
     * Team-customers - many to many 
     * CE CLIENTI ARE ATASATI UN OPERATOR DECALEX
     **/
    public function customers() {
        return $this
            ->belongsToMany(Customer::class, 'team-customers', 'user_id', 'customer_id')
            ->withPivot('id', 'created_by', 'updated_by')
            ->withTimestamps();
    }
    
}
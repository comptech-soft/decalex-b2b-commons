<?php

namespace B2B\Traits\Decalex\Customer;

trait Relations {

    /** customer->city  */
    public function city() {
        return $this->belongsTo(\System\Models\City::class, 'city_id');
    }

    /** customer->contracts */
    function contracts() {
        return $this->hasMany(\Decalex\Models\CustomerContract::class, 'customer_id')->orderBy('date_to', 'desc');
    }

    /** customer->persons */
    function persons() {
        return $this->hasMany(\Decalex\Models\CustomerPerson::class, 'customer_id');
    }

    /** customer->departamente */
    function departments() {
        return $this->hasMany(\Decalex\Models\CustomerDepartament::class, 'customer_id');
    }

}
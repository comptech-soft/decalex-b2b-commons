<?php

namespace B2B\Traits\Decalex\Customer;

trait Relations {

    /** customer->city  */
    public function city() {
        return $this->belongsTo(\B2B\Models\System\City::class, 'city_id');
    }

    /** customer->contracts */
    function contracts() {
        return $this->hasMany(\B2B\Models\Decalex\CustomerContract::class, 'customer_id')->orderBy('date_to', 'desc');
    }

    /** customer->persons */
    function persons() {
        return $this->hasMany(\B2B\Models\Decalex\CustomerPerson::class, 'customer_id');
    }

    /** customer->departamente */
    function departments() {
        return $this->hasMany(\B2B\Models\Decalex\CustomerDepartament::class, 'customer_id');
    }

}
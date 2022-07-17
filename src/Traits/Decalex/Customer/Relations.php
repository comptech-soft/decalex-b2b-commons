<?php

namespace B2B\Traits\Decalex\Customer;

use B2B\Models\Decalex\CustomerContract;
use B2B\Models\System\City;
use B2B\Models\Decalex\CustomerPerson;
use B2B\Models\Decalex\CustomerDepartament;

trait Relations {

    /** customer->city  */
    public function city() {
        return $this->belongsTo(City::class, 'city_id');
    }

    /** customer->contracts */
    function contracts() {
        return $this->hasMany(CustomerContract::class, 'customer_id')->orderBy('date_to', 'desc');
    }

    /** customer->persons */
    function persons() {
        return $this->hasMany(CustomerPerson::class, 'customer_id');
    }

    /** customer->departamente */
    function departments() {
        return $this->hasMany(CustomerDepartament::class, 'customer_id');
    }

}
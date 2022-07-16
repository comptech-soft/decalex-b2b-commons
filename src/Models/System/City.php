<?php

namespace B2B\Models\System;

use Illuminate\Database\Eloquent\Model;

use B2B\Traits\System\City\Actions;
use B2B\Traits\System\City\GetCities;
use B2B\Traits\System\City\Relations;

class City extends Model {

    use Actions, GetCities, Relations;

    protected $table = 'sys-cities';

    protected $fillable = [
        'id',
        'name',
        'postal_code',
        'latitude',
        'longitude',
        'region_id',
        'created_by',
        'updated_by'
    ];
}
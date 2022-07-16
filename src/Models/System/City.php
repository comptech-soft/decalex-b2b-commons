<?php

namespace System\Models;

use Illuminate\Database\Eloquent\Model;

use System\Traits\City\Actions;
use System\Traits\City\GetCities;
use System\Traits\City\Relations;

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
<?php

namespace B2B\Models\System;

use Illuminate\Database\Eloquent\Model;

use B2B\Traits\System\Country\Actions;
use B2B\Traits\System\Country\GetCountries;
use B2B\Traits\System\Country\Relations;

class Country extends Model {
    use Actions, GetCountries, Relations;

    protected $table = 'sys-countries';

    protected $fillable = [
        'id',
        'name',
        'code',
        'vat_prefix',
        'phone_prefix',
        'created_by',
        'updated_by'
    ]; 

}
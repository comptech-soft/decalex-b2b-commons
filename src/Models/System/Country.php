<?php

namespace System\Models;

use Illuminate\Database\Eloquent\Model;

use System\Traits\Country\Actions;
use System\Traits\Country\GetCountries;
use System\Traits\Country\Relations;

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
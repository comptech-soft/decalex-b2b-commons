<?php

namespace B2B\Models\System;

use Illuminate\Database\Eloquent\Model;

use System\Traits\Region\Actions;
use System\Traits\Region\GetRegions;
use System\Traits\Region\Relations;

class Region extends Model {

    use Actions, GetRegions, Relations;
    
    protected $table = 'sys-regions';

    protected $fillable = [
        'id',
        'name',
        'code',
        'country_id',
        'created_by',
        'updated_by'
    ];

}
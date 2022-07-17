<?php

namespace B2B\Models\System;

use Illuminate\Database\Eloquent\Model;

use B2B\Traits\System\Region\Actions;
use B2B\Traits\System\Region\GetRegions;
use B2B\Traits\System\Region\Relations;

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
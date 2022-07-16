<?php

namespace B2B\Models\Cartalyst;

use Cartalyst\Sentinel\Roles\EloquentRole;

use B2B\Traits\Cartalyst\Role\GetRoles;
use B2B\Traits\Cartalyst\Role\Actions;

class Role extends EloquentRole {

    use Actions, GetRoles;
    
    protected $fillable = [
        'id',
        'slug',
        'type',
        'name',
        'permissions',
        'created_by',
        'updated_by',
        'color',
        'editable',
        'deleteable'
    ];

}

<?php

namespace ComptechSoft\Decalex\Models\Cartalyst;

use Cartalyst\Sentinel\Roles\EloquentRole;

use Cartalyst\Traits\Role\GetRoles;
use Cartalyst\Traits\Role\Actions;

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

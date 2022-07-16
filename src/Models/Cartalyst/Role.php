<?php

namespace ComptechSoft\Decalex\Models\Cartalyst;

use Cartalyst\Sentinel\Roles\EloquentRole;

use ComptechSoft\Decalex\Traits\Cartalyst\Role\GetRoles;
use ComptechSoft\Decalex\Traits\Cartalyst\Role\Actions;

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

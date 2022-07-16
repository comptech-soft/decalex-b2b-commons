<?php

namespace B2B\Models\Cartalyst;

use Illuminate\Database\Eloquent\Model;
use Kalnoy\Nestedset\NodeTrait;

use B2B\Traits\Cartalyst\Permission\GetPermissions;
use B2B\Traits\Cartalyst\Permission\Actions;
use B2B\Traits\Cartalyst\Permission\Reorder;
use B2B\Traits\Cartalyst\Permission\DeleteChildren;

// https://github.com/lazychaser/laravel-nestedset#installation

class Permission extends Model {
    
    use NodeTrait, GetPermissions, Actions, Reorder, DeleteChildren;
    
    protected $table = 'permissions';

    protected $with = ['ancestors'];

    protected $fillable = [
        'id',
        'name',
        'slug',
        'type',
        'description',
        'order_no',
        'created_by',
        'updated_by',
    ];

}

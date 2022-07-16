<?php

namespace ComptechSoft\Decalex\Models\Cartalyst;

use Illuminate\Database\Eloquent\Model;
use Kalnoy\Nestedset\NodeTrait;

use ComptechSoft\Decalex\Traits\Cartalyst\Permission\GetPermissions;
use ComptechSoft\Decalex\Traits\Cartalyst\Permission\Actions;
use ComptechSoft\Decalex\Traits\Cartalyst\Permission\Reorder;
use ComptechSoft\Decalex\Traits\Cartalyst\Permission\DeleteChildren;

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

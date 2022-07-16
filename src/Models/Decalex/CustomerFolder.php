<?php

namespace Decalex\Models;

use Illuminate\Database\Eloquent\Model;

use Decalex\Traits\CustomerFolder\Actions;
use Decalex\Traits\CustomerFolder\GetFolders;
use Decalex\Traits\CustomerFolder\Relations;

use Kalnoy\Nestedset\NodeTrait;

class CustomerFolder extends Model {

    use NodeTrait, Actions, GetFolders, Relations; 
    
    protected $table = 'customers-folders';

    protected $with = ['children', 'files'];

    protected $casts = [
        'id' => 'integer',
        'created_by' => 'integer',
        'updated_by' => 'integer',
        'customer_id' => 'integer',
        'deleted' => 'integer',
        'parent_id' => 'integer',
    ];

    protected $fillable = [
        'id',
        'name',
        'platform',
        'customer_id',
        'deleted',
        'status',
        'created_by',
        'updated_by'
    ];

}
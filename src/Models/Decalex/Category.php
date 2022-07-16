<?php

namespace Decalex\Models;

use Illuminate\Database\Eloquent\Model;

use Decalex\Traits\Category\Actions;
use Decalex\Traits\Category\GetCategories;
use Decalex\Traits\Category\Export;
use Decalex\Traits\Category\Relations;
use Decalex\Traits\Category\Reorder;

class Category extends Model {

    use Actions, GetCategories, Relations, Export, Reorder;
    
    protected $table = 'categories';

    protected $fillable = [
        'id',
        'name',
        'type',
        'props',
        'created_by',
        'updated_by'
    ];

}
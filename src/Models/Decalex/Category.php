<?php

namespace B2B\Models\Decalex;

use Illuminate\Database\Eloquent\Model;

use B2B\Traits\Decalex\Category\Actions;
use B2B\Traits\Decalex\Category\GetCategories;
use B2B\Traits\Decalex\Category\Export;
use B2B\Traits\Decalex\Category\Relations;
use B2B\Traits\Decalex\Category\Reorder;

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
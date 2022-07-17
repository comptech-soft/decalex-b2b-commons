<?php

namespace B2B\Models\Decalex;

use Illuminate\Database\Eloquent\Model;

use B2B\Traits\Decalex\Task\Actions;
use B2B\Traits\Decalex\Task\GetTasks;
use B2B\Traits\Decalex\Task\Export;
use B2B\Traits\Decalex\Task\Relations;
use B2B\Traits\Decalex\Task\Reorder;

class Task extends Model {

    use Actions, GetTasks, Relations, Export, Reorder;
    
    protected $table = 'tasks';

    protected $casts = [
        'props' => 'json',
    ];

    protected $fillable = [
        'id',
        'name',
        'norma_timp',
        'oder_no',
        'props',
        'created_by',
        'updated_by'
    ];

}
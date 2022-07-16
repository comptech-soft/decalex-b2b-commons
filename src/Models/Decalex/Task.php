<?php

namespace B2B\Models\Decalex;

use Illuminate\Database\Eloquent\Model;

use Decalex\Traits\Task\Actions;
use Decalex\Traits\Task\GetTasks;
use Decalex\Traits\Task\Export;
use Decalex\Traits\Task\Relations;
use Decalex\Traits\Task\Reorder;

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
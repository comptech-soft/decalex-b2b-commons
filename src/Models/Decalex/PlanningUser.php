<?php

namespace Decalex\Models;

use Illuminate\Database\Eloquent\Model;

// use Decalex\Traits\Planning\Actions;
// use Decalex\Traits\Planning\GetPlanning;
// use Decalex\Traits\Planning\Export;
use Decalex\Traits\PlanningUser\Relations;
// use Decalex\Traits\Planning\Reorder;
// use Decalex\Traits\Planning\UpdateTaskStatus;

class PlanningUser extends Model {

    // use Actions, GetPlanning, , Export, Reorder, UpdateTaskStatus;
    use Relations;

    protected $table = 'planificari-users';

    protected $with = ['user'];
    
    protected $casts = [
        'props' => 'json',
        'task_id' => 'integer',
        'user_id' => 'integer',
        'id' => 'integer',
        'created_by' => 'integer',
        'updated_by' => 'integer',
    ];

    protected $fillable = [
        'id',
        'task_id',
        'user_id',
        'ore_efectuate',
        'props',
        'created_by',
        'updated_by',
    ];

}
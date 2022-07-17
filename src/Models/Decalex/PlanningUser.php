<?php

namespace B2B\Models\Decalex;

use Illuminate\Database\Eloquent\Model;

// use B2B\Traits\Decalex\Planning\Actions;
// use B2B\Traits\Decalex\Planning\GetPlanning;
// use B2B\Traits\Decalex\Planning\Export;
use B2B\Traits\Decalex\PlanningUser\Relations;
// use B2B\Traits\Decalex\Planning\Reorder;
// use B2B\Traits\Decalex\Planning\UpdateTaskStatus;

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
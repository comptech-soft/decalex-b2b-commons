<?php

namespace Decalex\Models;

use Illuminate\Database\Eloquent\Model;

use Decalex\Traits\Planning\Actions;
use Decalex\Traits\Planning\GetPlanning;
use Decalex\Traits\Planning\Export;
use Decalex\Traits\Planning\Relations;
use Decalex\Traits\Planning\Reorder;
use Decalex\Traits\Planning\UpdateTaskStatus;

class Planning extends Model {

    use Actions, GetPlanning, Relations, Export, Reorder, UpdateTaskStatus;
    
    protected $table = 'planificari';

    protected $with = ['users'];

    protected $casts = [
        'props' => 'json',
        'assigned_users' => 'json',
        'customer_id' => 'integer',
        'task_id' => 'integer',
        'order_service_id' => 'integer',
        'service_id' => 'integer',
        'order_id' => 'integer',
        'contract_id' => 'integer',
        'project_id' => 'integer',
        'assigned_to' => 'integer',
        'created_by' => 'integer',
        'updated_by' => 'integer',
        'is_visible' => 'integer',
        'deadlines' => 'array',
    ];

    protected $fillable = [
        'id',
        'status',
        'date_from',
        'date_to',
        'customer_id',
        'task_id',
        'service_id',
        'order_id',
        'is_visible',
        'contract_id',
        'order_service_id',
        'percent',
        'project_id',
        'assigned_to',
        'assigned_users',
        'estimated_time',
        'effective_time',
        'description',
        'props',
        'deadlines',
        'created_by',
        'updated_by',
    ];

}
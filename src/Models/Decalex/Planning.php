<?php

namespace B2B\Models\Decalex;

use Illuminate\Database\Eloquent\Model;

use B2B\Traits\Decalex\Planning\Actions;
use B2B\Traits\Decalex\Planning\GetPlanning;
use B2B\Traits\Decalex\Planning\Export;
use B2B\Traits\Decalex\Planning\Relations;
use B2B\Traits\Decalex\Planning\Reorder;
use B2B\Traits\Decalex\Planning\UpdateTaskStatus;

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
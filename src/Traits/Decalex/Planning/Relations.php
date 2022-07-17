<?php

namespace B2B\Traits\Decalex\Planning;

use B2B\Models\Decalex\Customer;
use B2B\Models\Decalex\CustomerOrder;
use B2B\Models\Decalex\Task;
use B2B\Models\Decalex\Team;
use B2B\Models\Decalex\Service;
use B2B\Models\Decalex\CustomerContract;
use B2B\Models\Decalex\PlanningUser;

trait Relations {

    /** planning->customer */
    public function customer() {
        return $this->belongsTo(Customer::class, 'customer_id');
    }

    /** planning->task */
    public function task() {
        return $this->belongsTo(Task::class, 'task_id');
    }

    /** planning->assignedTo */
    public function assignedto() {
        return $this->belongsTo(Team::class, 'assigned_to');
    }

    /** planning->service */
    public function service() {
        return $this->belongsTo(Service::class, 'service_id');
    }

    /** planning->contract */
    public function contract() {
        return $this->belongsTo(CustomerContract::class, 'contract_id');
    }

    /** planning->order */
    public function order() {
        return $this->belongsTo(CustomerOrder::class, 'order_id');
    }

    /** planning->users */
    public function users() {
        return $this->hasMany(PlanningUser::class, 'task_id');
    }
    
}
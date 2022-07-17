<?php

namespace B2B\Traits\Decalex\Planning;

trait Relations {

    /** planning->customer */
    public function customer() {
        return $this->belongsTo(\B2B\Models\Decalex\Customer::class, 'customer_id');
    }

    /** planning->task */
    public function task() {
        return $this->belongsTo(\B2B\Models\Decalex\Task::class, 'task_id');
    }

    /** planning->assignedTo */
    public function assignedto() {
        return $this->belongsTo(\B2B\Models\Decalex\Team::class, 'assigned_to');
    }

    /** planning->service */
    public function service() {
        return $this->belongsTo(\B2B\Models\Decalex\Service::class, 'service_id');
    }

    /** planning->contract */
    public function contract() {
        return $this->belongsTo(\B2B\Models\Decalex\CustomerContract::class, 'contract_id');
    }

    /** planning->order */
    public function order() {
        return $this->belongsTo(\B2B\Models\Decalex\CustomerOrder::class, 'order_id');
    }

    /** planning->users */
    public function users() {
        return $this->hasMany(\B2B\Models\Decalex\PlanningUser::class, 'task_id');
    }
    
}
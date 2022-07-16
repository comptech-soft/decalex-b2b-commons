<?php

namespace Decalex\Traits\Planning;

trait Relations {

    /** planning->customer */
    public function customer() {
        return $this->belongsTo(\Decalex\Models\Customer::class, 'customer_id');
    }

    /** planning->task */
    public function task() {
        return $this->belongsTo(\Decalex\Models\Task::class, 'task_id');
    }

    /** planning->assignedTo */
    public function assignedto() {
        return $this->belongsTo(\Decalex\Models\Team::class, 'assigned_to');
    }

    /** planning->service */
    public function service() {
        return $this->belongsTo(\Decalex\Models\Service::class, 'service_id');
    }

    /** planning->contract */
    public function contract() {
        return $this->belongsTo(\Decalex\Models\CustomerContract::class, 'contract_id');
    }

    /** planning->order */
    public function order() {
        return $this->belongsTo(\Decalex\Models\CustomerOrder::class, 'order_id');
    }

    /** planning->users */
    public function users() {
        return $this->hasMany(\Decalex\Models\PlanningUser::class, 'task_id');
    }
    
}
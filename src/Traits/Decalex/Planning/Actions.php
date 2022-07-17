<?php

namespace B2B\Traits\Decalex\Planning;

use B2B\Classes\Comptech\Performers\Datatable\DoAction;

trait Actions {

    public static function GetMessages($action, $input) {

        return [
            'users.required' => 'Cel puțin un operator trebuie selectat.',
            'customer_id.required' => 'Clientul trebuie selectat.',
            'task_id.required' => 'Taskul trebuie selectat.',
            'contract_id.required' => 'Contractul trebuie selectat.',
            'order_id.required' => 'Comanda trebuie selectată.',
            'date_to.required' => 'Data "Deadline" trebuie selectată.',
            'service_id.required' => 'Serviciul trebuie selectat.',
            'order_service_id.required' => 'Serviciul trebuie selectat.',
        ];
    }

    /** Get Rules */
    public static function GetRules($action, $input) {
        if($action == 'delete')
        {
            return NULL;
        }
        $result = [
            'date_to' => 'required|date',
            'users' => 'required|array|min:1',
            'customer_id' => 'required|exists:customers,id',
            'task_id' => 'required|exists:tasks,id',
            'contract_id' => 'required|exists:customers-contracts,id',
            'order_id' => 'required|exists:customers-orders,id',
            'service_id' => 'required|exists:services,id',
            'order_service_id' => 'required|exists:customers-orders-services,id',
        ];

        if( $action == 'update')
        {
        }

        return $result;
    }

    public static function PrepareActionInput($action, $input) {

        if($action == 'insert')
        {
            $input['deadlines'] = [[
                'date_from' => $input['date_from'],
                'updated_at' => \Carbon\Carbon::now()->format('Y-m-d'),
                'updated_by' => \Sentinel::check()->id,
            ]];
        }
        else
        {
            if($action == 'update')
            {
            }
        }
        return $input;
    }

    public function attachUsers($input) {
        foreach($input as $i => $user_id)
        {
            \B2B\Models\Decalex\PlanningUser::create([
                'task_id' => $this->id,
                'user_id' => $user_id,
                'created_by' => \Sentinel::check()->id,
            ]);
        }
    }

    public function syncUsers($input) {

        \B2B\Models\Decalex\PlanningUser::where('task_id', $this->id)->delete();

        foreach($input as $i => $user_id)
        {
            \B2B\Models\Decalex\PlanningUser::create([
                'task_id' => $this->id,
                'user_id' => $user_id,
                'created_by' => \Sentinel::check()->id,
            ]);
        }
    }

    public static function doInsert($input, $task) {
        $collect = collect($input)->except(['users', 'assigned_to'])->toArray();

        $task = self::create($collect);

        $task->attachUsers($input['users']);

        return $task;
    }

    public static function doUpdate($input, $task) {
        if($input['date_from'] != $task->date_from)
        {
            $input['deadlines'] = $task->deadlines ? $task->deadlines : [];
            $input['deadlines'][] = [
                'date_from' => $input['date_from'],
                'updated_at' => \Carbon\Carbon::now()->format('Y-m-d'),
                'updated_by' => \Sentinel::check()->id,
            ];
        }

        if( ! array_key_exists('props', $input) )
        {
            $input['props'] = NULL;
        }

        $task->update($input);

        $task->syncUsers($input['users']);

        return $task;
    }

    public static function doDelete($input, $task) {
        \B2B\Models\Decalex\PlanningUser::where('task_id', $task->id)->delete();
        $task->delete();
        return $task;
    }

    public static function doAction($action, $input) {
        return (new DoAction($action, $input, __CLASS__))->Perform();
    }

}
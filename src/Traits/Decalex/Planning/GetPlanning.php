<?php

namespace Decalex\Traits\Planning;

use Comptech\Performers\Datatable\GetItems;

trait GetPlanning {

    /**  Get items */
    public static function getQuery()
    {
        return 
            self::query()
            ->with(['task', 'service', 'contract', 'order']);
        ;
    }

    /**  Get items */
    public static function getItems($input) {

        if(array_key_exists('whereOperators', $input) && $input['whereOperators'])
        {
            $operators = collect(explode(',', $input['whereOperators']));      
            $input['wheres'][] = '(`planificari`.`is_visible` = 1)';      
        }

        $q = self::query();
        foreach($input['wheres'] as $i => $where)
        {
            $q->whereRaw($where);
        }
        $tasks = $q->get();

        foreach($tasks as $i => $task) 
        {
            $users = $task->users->map(function($item){
                return $item->user_id;
            });

            $task->assigned_users = $users->toArray();
            $task->is_visible = 1;

            if(array_key_exists('whereOperators', $input) && $input['whereOperators'])
            {
                $intersection = $operators->intersect($users);

                if($intersection->count() == 0)
                {
                    $task->is_visible = 0;
                }
            }

            $task->save();
        }

        return (new GetItems($input, self::getQuery(), __CLASS__))->Perform();  
    }

}
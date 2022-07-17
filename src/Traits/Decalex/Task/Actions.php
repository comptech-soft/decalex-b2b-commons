<?php

namespace B2B\Traits\Decalex\Task;

use B2B\Classes\Comptech\Performers\Datatable\DoAction;

trait Actions {

    /** Get Rules */
    public static function GetRules($action, $input) {
       
        if($action == 'delete')
        {
            return NULL;
        }
        $result = [
            'name' => 'required|unique:tasks,name',
        ];

        if( $action == 'update')
        {
            $result['name'] .= (',' . $input['id']);
        }

        return $result;
    }

    public static function doAction($action, $input) {
        return (new DoAction($action, $input, __CLASS__))->Perform();
    }

}
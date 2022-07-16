<?php

namespace Cartalyst\Traits\Role;

use Comptech\Performers\Datatable\DoAction;

trait Actions {

    /** Get Rules */
    public static function GetRules($action, $input) {
        if($action == 'delete')
        {
            return NULL;
        }
        $result = [
            'slug' => 'required|max:191|unique:roles,slug',
            'name' => 'required|max:191|unique:roles,name',
        ];
        if( $action == 'update')
        {
            $result['slug'] .= (',' . $input['id']);
            $result['name'] .= (',' . $input['id']);
        }
        return $result;
    }
    
    public static function doAction($action, $input) {
        return (new DoAction($action, $input, __CLASS__))->Perform();
    }

}
<?php

namespace Cartalyst\Traits\Permission;

use Comptech\Performers\Datatable\DoAction;

trait Actions {

    public static function doInsert($input, $permission) {
        
        if( ! array_key_exists('parent_id', $input) || ! $input['parent_id'])
        {
            $permission = new self($input);
            $permission->save();
        }
        else
        {
            $parent_id = $input['parent_id'];
            $parent = self::find($parent_id);
            $parent->children()->create($input);
        }
        return $permission;
    }

    public static function getNextOrder() {
        $records = \DB::select("SELECT MAX(CAST(`order_no` AS UNSIGNED)) as max_order_no FROM `permissions`");
        return number_format(1 + $records[0]->max_order_no, 0, '', '');
    }

    public static function doAction($action, $input) {
        if($action == 'insert')
        {
            $input['order_no'] = self::getNextOrder();
        }
        return (new DoAction($action, $input, __CLASS__))->Perform();
    }

}
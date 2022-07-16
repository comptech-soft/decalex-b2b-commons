<?php

namespace B2B\Traits\Cartalyst\Permission;

use Comptech\Performers\Datatable\GetItems;

trait GetPermissions {

    public static function getItems($input) {
        $parent_id = $input['custom']['parent_id'];
        if($parent_id)
        {
            return (new GetItems($input, self::query()->withCount('children')->where('parent_id', $parent_id), __CLASS__))->Perform();
        }
        return (new GetItems($input, self::query()->withCount('children')->whereNull('parent_id'), __CLASS__))->Perform();
    }

    public static function getAscendents($id) {
        return self::defaultOrder()->ancestorsOf($id);
    }

    /**
     * Toate permisiunile radacina de tipul type
     */
    public static function getTrees($type) {
       
        $trees = self::query()->whereNull('parent_id')->where('type', $type)->orderBy('order_no')->with(['descendants'])->get();

        $r = [];
        foreach($trees as $i => $tree)
        {
            // $r[] = [
            //     'root' => $tree, 
            //     'children' => $tree->descendants->toTree(),
            // ];
            $tree->children = $tree->descendants->toTree();
            $r[] = $tree;
        }
        return $r;
    }

}
<?php

namespace B2B\Traits\Decalex\Chestionar;

use Comptech\Performers\Datatable\DoAction;

trait Actions {

    /** Get Rules */
    public static function GetRules($action, $input) {
       
        if($action == 'delete')
        {
            return NULL;
        }
        $result = [
            'category_id' => 'required|exists:categories,id',
            'name' => 'required|unique:chestionare,name',
            'description' => 'required',
            'subject' => 'required',
            'body' => 'required',
        ];

        if( $action == 'update')
        {
            $result['name'] .= (',' . $input['id']);
        }

        return $result;
    }

    public static function doInsert($input, $chestionar) {

        $collectInput = collect($input);
        
        $chestionar = self::create($collectInput->except(['id', 'template_id'])->toArray());

        if( array_key_exists('intrebari', $input) )
        {
            $chestionar->attachIntrebari($input['intrebari']);
        }

        $chestionar->props = ['template_id' => $input['template_id']];
        $chestionar->save();
        
        return $chestionar;
    }

    public static function doDuplicate($input, $chestionar) {
        return self::doInsert($input, NULL);
    }

    public static function doDelete($input, $chestionar) {
        
        $chestionar->deleted = 1;
        $chestionar->props = [...$chestionar->props ? $chestionar->props : [], 'deleted_by' => \Sentinel::check()->id];
        $chestionar->save();
        return $chestionar;
    }

    public static function doAction($action, $input) {
        return (new DoAction($action, $input, __CLASS__))->Perform();
    }

}
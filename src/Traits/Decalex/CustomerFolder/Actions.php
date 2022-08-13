<?php

namespace B2B\Traits\Decalex\CustomerFolder;

use B2B\Classes\Comptech\Performers\Datatable\DoAction;
use B2B\Rules\Decalex\CustomerFolder\ValidName;

trait Actions {

    /** Get Rules */
    public static function GetRules($action, $input) {
        if($action == 'delete')
        {
            return NULL;
        }
        $result = [
            'customer_id' => 'required|exists:customers,id',
            'name' => [
                'required',
                new ValidName($input),
            ],
           
        ];
        return $result;
    }

    public static function doInsert($input, $folder) {

        if(! array_key_exists('parent_id', $input) )
        {
            $input['parent_id'] = NULL;
        } 

        if( ! $input['parent_id'] )
        {
            $folder = new self($input);
            $folder->save();
        }
        else
        {
            $parent = self::find($input['parent_id']);
            $folder = $parent->children()->create($input);
        }
    
        return $folder;
    }

    public static function doAction($action, $input) {
        return (new DoAction($action, $input, __CLASS__))->Perform();
    }

    public static function validateFolderName($input) {
        $validator = \Validator::make($input, [
            'name' => [
                new ValidName($input),
            ],
        ]);

        return $validator->fails() ? 0 : 1;
    }

}
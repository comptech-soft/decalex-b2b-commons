<?php

namespace B2B\Traits\Decalex\Centralizator;

use B2B\Classes\Comptech\Performers\Datatable\DoAction;

trait Actions {

    /** Get Rules */
    public static function GetRules($action, $input) {
        if($action == 'delete')
        {
            return NULL;
        }
        $result = [
            'name' => 'required',
            'category_id' => 'required|exists:categories,id',
        ];
        return $result;
    }

    public static function doInsert($input, $centralizator) {

        $collectionInput = collect($input);

        $centralizator = self::create($collectionInput->except(['columns'])->toArray());

        if(array_key_exists('columns', $input))
        {
            $centralizator->attachColumns($collectionInput->only(['columns'])->toArray()['columns']);
        }

        return $centralizator;
    }

    public static function doDuplicate($input, $centralizator) {
        return self::doInsert($input, null);
    }

    public static function doUpdate($input, $centralizator) {
        $collectionInput = collect($input);

        $centralizator->update($collectionInput->except(['columns'])->toArray());

        if(array_key_exists('columns', $input))
        {
            $centralizator->attachColumns($collectionInput->only(['columns'])->toArray()['columns']);
        }

        return $centralizator;
    }

    public static function doDelete($input, $centralizator) {
        
        $centralizator->deleted = 1;
        $centralizator->updated_by = \Sentinel::check()->id;
        $centralizator->save();
        return $centralizator;
    }

    public static function doAction($action, $input) {
        return (new DoAction($action, $input, __CLASS__))->Perform();
    }

}
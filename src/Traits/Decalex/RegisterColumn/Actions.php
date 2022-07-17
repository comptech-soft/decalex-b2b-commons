<?php

namespace B2B\Traits\Decalex\RegisterColumn;

use B2B\Classes\Comptech\Performers\Datatable\DoAction;

trait Actions {

    /** Get Rules */
    public static function GetRules($action, $input) {
        /**
         * Acelasi numar de contract poate fi la mai multi customers (clienti)
         * Un client nu poate sa aiba de doua ori acelasi numar de contract
         */
        if($action == 'delete')
        {
            return NULL;
        }
        $result = [
            'caption' => 'required',
        ];
        return $result;
    }

    public static function doDelete($input, $column) {
        $column->deleted = 1;
        $column->save();

        self::where('group_id', $column->id)->update([
            'deleted' => 1,
        ]);
        
        return $column;
    }

    public static function doAction($action, $input) {
        return (new DoAction($action, $input, __CLASS__))->Perform();
    }

}
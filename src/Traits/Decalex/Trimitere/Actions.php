<?php

namespace B2B\Traits\Decalex\Trimitere;

use B2B\Classes\Comptech\Performers\Datatable\DoAction;

trait Actions {

    /** Get Rules */
    public static function GetRules($action, $input) {

        if($action == 'delete')
        {
            return NULL;
        }
        $result = [
            'number' => 'required',
            'date' => 'required|date',
            'completed_from' => 'required|date',
            'completed_to' => 'required|date',
            'effective_time' => 'required|numeric'
            
        ];

        return $result;
    }

    /** Get Messages */
    public static function GetMessages($action, $input) {

        $result = [
            'number.required' => 'Numărul trebuie completat',
            'date.required' => 'Data trebuie completată',
            'completed_from.required' => 'Intervalul trebuie completat',
            'completed_to.required' => 'Intervalul trebuie completat',
            'effective_time.required' => 'Timpul de lucru trebuie completat',
            
        ];

        return $result;
    }

    public static function doAction($action, $input) {
        return (new DoAction($action, $input, __CLASS__))->Perform();
    }

}
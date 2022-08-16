<?php

namespace B2B\Traits\Decalex\Trimitere;

use B2B\Classes\Comptech\Performers\Datatable\DoAction;
use B2B\Rules\Decalex\Trimitere\ValidNumber;

trait Actions {

    /** Get Rules */
    public static function GetRules($action, $input) {

        if($action == 'delete')
        {
            return NULL;
        }
        $result = [
            'number' => [
                'required',
                new ValidNumber($input),
            ],
            'date' => [
                'required',
                'date',
            ],        
        ];

        return $result;
    }

    /** Get Messages */
    public static function GetMessages($action, $input) {

        $result = [
            'number.required' => 'Numărul trebuie completat',
            'date.required' => 'Data trebuie completată',            
        ];

        return $result;
    }

    // public static function DoInsert($input, $trimitere) {
    //     dd($input, $trimitere);
    // }

    public static function doAction($action, $input) {
        return (new DoAction($action, $input, __CLASS__))->Perform();
    }




}
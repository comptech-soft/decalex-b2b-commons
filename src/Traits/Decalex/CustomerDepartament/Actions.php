<?php

namespace B2B\Traits\Decalex\CustomerDepartament;

use B2B\Classes\Comptech\Performers\Datatable\DoAction;
use B2B\Rules\Decalex\CustomerDepartment\UniqueName;

trait Actions {

    public static function GetMessages($action, $input) {
        return [
            'departament.required' => 'Denumirea departamentului trebuie completată.',
        ];
    }

    public static function GetRules($action, $input) {
        if($action == 'delete')
        {
            return NULL;
        }
        $result = [
            'departament' => [
                'required', 
                new UniqueName($input),
            ],
            'customer_id' => 'exists:customers,id',
        ];

        if($action == 'update')
        {
        }

        return $result;
    }

    public static function doAction($action, $input) {
        return (new DoAction($action, $input, __CLASS__))->Perform();
    }

}
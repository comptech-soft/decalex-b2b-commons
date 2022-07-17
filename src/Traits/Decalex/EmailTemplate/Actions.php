<?php

namespace B2B\Traits\Decalex\EmailTemplate;

use Comptech\Performers\Datatable\DoAction;

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
            'name' => 'required|unique:email-templates,name',
            'subject' => 'required',
        ];

        if($action == 'update')
        {
            
            $result['name'] .= (',' . $input['id']);
        }

        return $result;
    }

    public static function doAction($action, $input) {
        return (new DoAction($action, $input, __CLASS__))->Perform();
    }

}
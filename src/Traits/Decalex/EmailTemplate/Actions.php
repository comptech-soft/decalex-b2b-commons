<?php

namespace B2B\Traits\Decalex\EmailTemplate;

use B2B\Classes\Comptech\Performers\Datatable\DoAction;
use B2B\Rules\Decalex\EmailTemplates\UniqueEmailTemplate;

trait Actions {

    public static function GetMessages($action, $input) {

        return [
            'entity.required' => 'Entitatea trebuie selectată.',
            'action.required' => 'Acțiunea trebuie completată.',
            'subject.required' => 'Suiectul trebuie completat.',
            'body.required' => 'Mesajul trebuie completat.',
            'platform.required' => 'Sensul emailului trebuie selectat.',
        ];

    }

    public static function GetRules($action, $input) {

        if($action == 'delete')
        {
            return NULL;
        }
        $result = [
            'name' => 'required|unique:email-templates,name',
            'subject' => 'required',
            'entity' => [
                'required',
                new UniqueEmailTemplate($input),
            ],
            'action' => 'required',
            'message' => 'required',
            'platform' => 'required',
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

    public static function validateUniqueNotificationType($input) {
        $validator = \Validator::make($input, [
            'action' => [
                new UniqueEmailTemplate($input),
            ],
        ]);

        return $validator->fails() ? 0 : 1;
    }

}
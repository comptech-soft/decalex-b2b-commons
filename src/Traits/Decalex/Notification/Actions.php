<?php

namespace B2B\Traits\Decalex\Notification;

use B2B\Classes\Comptech\Performers\Datatable\DoAction;
use B2B\Rules\Decalex\Notification\UniqueNotification;

trait Actions {

    public static function GetMessages($action, $input) {

        return [
            'entity.required' => 'Entitatea trebuie completată.',
            'action.required' => 'Acțiunea trebuie completată.',
            'props.title.required' => 'Titlul trebuie completat.',
            'message.required' => 'Mesajul trebuie completat.',
        ];
    }

    public static function GetRules($action, $input) {
        if($action == 'delete')
        {
            return NULL;
        }
        $result = [
            'entity' => [
                'required',
                new UniqueNotification($input),
            ],
            'action' => 'required',
            'props.title' => 'required',
            'message' => 'required',
        ];

        return $result;
    }

    public static function doAction($action, $input) {
        return (new DoAction($action, $input, __CLASS__))->Perform();
    }

}
<?php

namespace B2B\Traits\Decalex\Notification;

use B2B\Classes\Comptech\Performers\Datatable\DoAction;
use B2B\Rules\Decalex\Notification\UniqueNotification;

trait Actions {

    public static function GetMessages($action, $input) {

        return [
            'entity.required' => 'Entitatea trebuie selectată.',
            'action.required' => 'Acțiunea trebuie completată.',
            'title.required' => 'Titlul trebuie completat.',
            'message.required' => 'Mesajul trebuie completat.',
            'platform.required' => 'Sensul notificării trebuie selectat.',
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
            'title' => 'required',
            'message' => 'required',
            'platform' => 'required',
        ];

        return $result;
    }

    public static function doAction($action, $input) {
        return (new DoAction($action, $input, __CLASS__))->Perform();
    }

    public static function validateUniqueNotificationType($input) {
        $validator = \Validator::make($input, [
            'action' => [
                new UniqueNotification($input),
            ],
        ]);

        return $validator->fails() ? 0 : 1;
    }

}
<?php

namespace Decalex\Traits\Notification;

use Comptech\Performers\Datatable\GetItems;

trait GetNotifications {

    public static function getItems($input) {
        return (new GetItems($input, self::query(), __CLASS__))->Perform();
    }

    public static function getByEntityAndAction($entity, $action) {

        $record = self::where('entity', $entity)->where('action', $action)->first();

        if(! $record )
        {
            $record = self::create([
                'entity' => $entity,
                'action' => $action,
            ]);
        }

        return $record;
    }


    public function Notify($input) {

        \Decalex\Models\CustomerNotification::create([
            ...$input,
            'type_id' => $this->id,
            'message' => $this->message,
        ]);

    }

}
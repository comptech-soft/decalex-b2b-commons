<?php

namespace B2B\Traits\Decalex\Notification;

use B2B\Classes\Comptech\Performers\Datatable\GetItems;
use B2B\Models\Decalex\CustomerNotification;

trait GetNotifications {

    /**
     * getItems: ==> tipurile de notificari
     */
    public static function getItems($input) {
        return (new GetItems($input, self::query()->withCount('notifications'), __CLASS__))->Perform();
    }

    /**
     * getByEntityAndAction
     */
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

    /**
     * Notify
     */
    public function Notify($input) {

        CustomerNotification::create([
            ...$input,
            'type_id' => $this->id,
            'message' => $this->message,
        ]);

    }

}
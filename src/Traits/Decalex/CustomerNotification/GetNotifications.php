<?php

namespace B2B\Traits\Decalex\CustomerNotification;

use B2B\Classes\Comptech\Performers\Datatable\GetItems;

trait GetNotifications {

    /**  Get items */
    public static function getQuery()
    {
        return 
            self::query()
            ->leftJoin(
                'notification-types',
                function($j) {
                    $j->on('notification-types.id', '=', 'customers-notifications.type_id');
                }
            )
            ->select('customers-notifications.*')
        ;
    }

    /**  Get items */
    public static function getItems($input) {
        return (new GetItems($input, self::getQuery()->with(['sender', 'type', 'customer']), __CLASS__))->Perform();
    }

}
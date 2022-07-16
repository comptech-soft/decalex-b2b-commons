<?php

namespace Decalex\Traits\CustomerNotification;

use Comptech\Performers\Datatable\GetItems;

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
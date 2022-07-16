<?php

namespace Decalex\Traits\CustomerNotification;

use Comptech\Performers\Datatable\DoAction;

trait Actions {

    public static function doDelete($input, $notificare) {
        $notificare->status = 'deleted';
        $notificare->updated_by = \Sentinel::check()->id;
        $notificare->save();
        return $notificare;
    }

    public static function doAction($action, $input) {
        return (new DoAction($action, $input, __CLASS__))->Perform();
    }

}
<?php

namespace ComptechSoft\Decalex\Traits\Decalex\UserSetting;

use Comptech\Performers\Datatable\GetItems;

trait GetSettings {

    public static function getByUserAndCode($user_id, $code) {
        return self::where('user_id', $user_id)->where('code', $code)->first();
    }
}
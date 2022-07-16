<?php

namespace B2B\Traits\Decalex\UserSetting;

trait GetSettings {

    public static function getByUserAndCode($user_id, $code) {
        return self::where('user_id', $user_id)->where('code', $code)->first();
    }

}
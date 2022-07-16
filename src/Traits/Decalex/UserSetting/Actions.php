<?php

namespace B2B\Traits\Decalex\UserSetting;

trait Actions {

    public static function saveSetting($input) {
        return (new \B2B\Performers\Decalex\UserSetting\SaveSetting($input))
            ->SetSuccessMessage('Saved successfully!')
            ->Perform();
    }

}
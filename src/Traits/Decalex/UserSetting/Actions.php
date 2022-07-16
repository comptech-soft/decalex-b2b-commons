<?php

namespace Decalex\Traits\UserSetting;

trait Actions {

    public static function saveSetting($input) {
        return (new \Decalex\Performers\UserSetting\SaveSetting($input))
            ->SetSuccessMessage('Saved successfully!')
            ->Perform();
    }

}
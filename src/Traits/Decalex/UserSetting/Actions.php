<?php

namespace B2B\Traits\Decalex\UserSetting;

use B2B\Performers\Decalex\UserSetting\SaveSetting;

trait Actions {

    public static function saveSetting($input) {
        return (new SaveSetting($input))
            ->SetSuccessMessage('Saved successfully!')
            ->Perform();
    }

}
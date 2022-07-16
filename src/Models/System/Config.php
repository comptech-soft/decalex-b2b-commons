<?php

namespace ComptechSoft\Decalex\Models\System;

class Config {

    public static function get() {

        // dd(__METHOD__);

        $user = \Sentinel::check();
        $roles = $user ? $user->roles : NULL;

        $locale = app()->getLocale();

        if( ! in_array($locale, ['ro', 'en']) )
        {
            $locale = 'en';
        }

        /** Atasez clientii de care raspunde $user */
        
        if($user)
        {
            /** deocamdata la rolul operator */
            $user->workingCustomers = NULL;
            if($user->role->slug == 'operator')
            {
                $user->workingCustomers = \Decalex\Models\TeamCustomer::where('user_id', $user->id)->orderBy('customer_id')->get();
            }

            $user->settings = \Decalex\Models\UserSetting::where('user_id', $user->id)->get()->pluck('value', 'code');
        }

        return [
            'user' => $user ? $user : NULL,
            'locale' => $locale,
            'timezone' => config('app.timezone'),
            'name' => config('app.name'),
            'shortname' => config('app.shortname'),
            'url' => config('app.url'),
            'env' => config('app.env'),
            'sysconfig' => \System\Models\Configuration::all(),
            'languages' => [
                'ro' => [
                    'caption' => 'Romanian',
                    'flag' => 'images/flags/ro.png',
                ],
                'en' => [
                    'caption' => 'English',
                    'flag' => 'images/flags/en.png',
                ],
            ],
        ];

    }

}
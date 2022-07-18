<?php

namespace B2B\Models\System;

use B2B\Models\Decalex\TeamCustomer;
use B2B\Models\Decalex\UserSetting;
use B2B\Models\System\Configuration;
use B2B\Models\Decalex\CustomerPerson;

class Config {

    public static function get() {

        $user = \Sentinel::check();

        $roles = $user ? $user->roles : NULL;

        $locale = app()->getLocale();

        if( ! in_array($locale, ['ro', 'en']) )
        {
            $locale = 'en';
        }

        $customers = [];

        if($user)
        {
            if($user->role)
            {
                if($user->role->type == 'admin')
                {
                    /** 
                     * Atasez clientii de care raspunde $user, deocamdata la rolul operator
                     * user.workingCustomers = clientii tasati unui operator
                     **/
                    $user->workingCustomers = NULL;
                    if($user->role->slug == 'operator')
                    {
                        $user->workingCustomers = TeamCustomer::where('user_id', $user->id)->orderBy('customer_id')->get();
                    }
                }

                if($user->role->type == 'b2b')
                {
                    $customers = CustomerPerson::where('user_id', $user->id)->with(['customer'])->get()->map(function($record) {
                        return $record->customer;
                    });
                }
            }
            
            $user->settings = UserSetting::where('user_id', $user->id)->get()->pluck('value', 'code');
        }
        
        return [
            'user' => $user ? $user : NULL,
            'locale' => $locale,
            'timezone' => config('app.timezone'),
            'name' => config('app.name'),
            'shortname' => config('app.shortname'),
            'url' => config('app.url'),
            'env' => config('app.env'),
            'platform' => config('app.platform'),
            'sysconfig' => Configuration::all(),

            /**
             * customers = clienti atasati userului (contului, persons) curent [CUSTOMER -> CUSTOERS-PERSONS -> USERS]
             */
            'customers' => $customers,

            /**
             * languages = localizarile existente
             */
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
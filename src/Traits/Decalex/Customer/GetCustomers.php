<?php

namespace B2B\Traits\Decalex\Customer;

use B2B\Classes\Comptech\Performers\Datatable\GetItems;

trait GetCustomers {

    public static function getItems($input) {
        return (new GetItems($input, self::query()->where('deleted', 0), __CLASS__))->Perform();  
    }

    public static function getCustomer($slug) {
        return self::query()->where('slug', $slug)->first();
    }

    public static function getCustomerStatistics($customer_id) {
        
        return [

            /** REGISTRE */
            'audit' => [
                'count' => \B2B\Models\Decalex\CustomerRegister::where('customer_id', $customer_id)->where('register_id', 2)->count(),
                'count_public' => \B2B\Models\Decalex\CustomerRegister::where('customer_id', $customer_id)->where('status', 'public')->where('register_id', 2)->count(),
            ],

            'incidente' => [
                'count' => \B2B\Models\Decalex\CustomerRegister::where('customer_id', $customer_id)->where('register_id', 1)->count(),
                'count_public' => \B2B\Models\Decalex\CustomerRegister::where('customer_id', $customer_id)->where('status', 'public')->where('register_id', 1)->count(),
            ],

            'ropa' => [
                'count' => \B2B\Models\Decalex\CustomerRegister::where('customer_id', $customer_id)->where('register_id', 5)->count(),
                'count_public' => \B2B\Models\Decalex\CustomerRegister::where('customer_id', $customer_id)->where('status', 'public')->where('register_id', 5)->count(),
            ],

            'ropaimputerniciti' => [
                'count' => \B2B\Models\Decalex\CustomerRegister::where('customer_id', $customer_id)->where('register_id', 6)->count(),
                'count_public' => \B2B\Models\Decalex\CustomerRegister::where('customer_id', $customer_id)->where('status', 'public')->where('register_id', 6)->count(),
            ],

            'consimtaminte' => [
                'count' => \B2B\Models\Decalex\CustomerRegister::where('customer_id', $customer_id)->where('register_id', 3)->count(),
                'count_public' => \B2B\Models\Decalex\CustomerRegister::where('customer_id', $customer_id)->where('status', 'public')->where('register_id', 3)->count(),
            ],
            
            'cereridsar' => [
                'count' => \B2B\Models\Decalex\CustomerRegister::where('customer_id', $customer_id)->where('register_id', 4)->count(),
                'count_public' => \B2B\Models\Decalex\CustomerRegister::where('customer_id', $customer_id)->where('status', 'public')->where('register_id', 4)->count(),
            ],

            
            
            



            'chestionare' => [
                'count' => \B2B\Models\Decalex\CustomerChestionar::where('customer_id', $customer_id)->count(),
            ],

            'centralizatoare' => [
                'count' => \B2B\Models\Decalex\CustomerCentralizator::where('customer_id', $customer_id)->count(),
            ],

            'files' => [
                'count' => \B2B\Models\Decalex\CustomerFile::where('customer_id', $customer_id)->count(),
            ],

            'educatie' => [
                'count' => \B2B\Models\Decalex\CustomerCurs::where('customer_id', $customer_id)->count(),
            ], 
        ];
    }

}
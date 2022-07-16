<?php

namespace Decalex\Traits\Customer;

use Comptech\Performers\Datatable\GetItems;

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
                'count' => \Decalex\Models\CustomerRegister::where('customer_id', $customer_id)->where('register_id', 2)->count(),
                'count_public' => \Decalex\Models\CustomerRegister::where('customer_id', $customer_id)->where('status', 'public')->where('register_id', 2)->count(),
            ],

            'incidente' => [
                'count' => \Decalex\Models\CustomerRegister::where('customer_id', $customer_id)->where('register_id', 1)->count(),
                'count_public' => \Decalex\Models\CustomerRegister::where('customer_id', $customer_id)->where('status', 'public')->where('register_id', 1)->count(),
            ],

            'ropa' => [
                'count' => \Decalex\Models\CustomerRegister::where('customer_id', $customer_id)->where('register_id', 5)->count(),
                'count_public' => \Decalex\Models\CustomerRegister::where('customer_id', $customer_id)->where('status', 'public')->where('register_id', 5)->count(),
            ],

            'ropaimputerniciti' => [
                'count' => \Decalex\Models\CustomerRegister::where('customer_id', $customer_id)->where('register_id', 6)->count(),
                'count_public' => \Decalex\Models\CustomerRegister::where('customer_id', $customer_id)->where('status', 'public')->where('register_id', 6)->count(),
            ],

            'consimtaminte' => [
                'count' => \Decalex\Models\CustomerRegister::where('customer_id', $customer_id)->where('register_id', 3)->count(),
                'count_public' => \Decalex\Models\CustomerRegister::where('customer_id', $customer_id)->where('status', 'public')->where('register_id', 3)->count(),
            ],
            
            'cereridsar' => [
                'count' => \Decalex\Models\CustomerRegister::where('customer_id', $customer_id)->where('register_id', 4)->count(),
                'count_public' => \Decalex\Models\CustomerRegister::where('customer_id', $customer_id)->where('status', 'public')->where('register_id', 4)->count(),
            ],

            
            
            



            'chestionare' => [
                'count' => \Decalex\Models\CustomerChestionar::where('customer_id', $customer_id)->count(),
            ],

            'centralizatoare' => [
                'count' => \Decalex\Models\CustomerCentralizator::where('customer_id', $customer_id)->count(),
            ],

            'files' => [
                'count' => \Decalex\Models\CustomerFile::where('customer_id', $customer_id)->count(),
            ],

            'educatie' => [
                'count' => \Decalex\Models\CustomerCurs::where('customer_id', $customer_id)->count(),
            ], 
        ];
    }

}
<?php

namespace B2B\Traits\Decalex\Customer;

use B2B\Classes\Comptech\Performers\Datatable\GetItems;
use B2B\Models\Decalex\CustomerRegister;
use B2B\Models\Decalex\CustomerChestionar;
use B2B\Models\Decalex\CustomerCentralizator;
use B2B\Models\Decalex\CustomerFile;
use B2B\Models\Decalex\CustomerCurs;

trait GetCustomers {

    public static function getItems($input) {
        return (new GetItems($input, self::query()->where('deleted', 0), __CLASS__))->Perform();  
    }

    public static function getCustomer($slug) {
        return self::query()->where('slug', $slug)->first();
    }

    public static function getCustomerStatistics($customer_id) {
        
        return [

            // /** REGISTRE */
            // 'audit' => [
            //     'count' => CustomerRegister::where('customer_id', $customer_id)->where('register_id', 2)->count(),
            //     'count_public' => CustomerRegister::where('customer_id', $customer_id)->where('status', 'public')->where('register_id', 2)->count(),
            // ],

            // 'incidente' => [
            //     'count' => CustomerRegister::where('customer_id', $customer_id)->where('register_id', 1)->count(),
            //     'count_public' => CustomerRegister::where('customer_id', $customer_id)->where('status', 'public')->where('register_id', 1)->count(),
            // ],

            // 'ropa' => [
            //     'count' => CustomerRegister::where('customer_id', $customer_id)->where('register_id', 5)->count(),
            //     'count_public' => CustomerRegister::where('customer_id', $customer_id)->where('status', 'public')->where('register_id', 5)->count(),
            // ],

            // 'ropaimputerniciti' => [
            //     'count' => CustomerRegister::where('customer_id', $customer_id)->where('register_id', 6)->count(),
            //     'count_public' => CustomerRegister::where('customer_id', $customer_id)->where('status', 'public')->where('register_id', 6)->count(),
            // ],

            // 'consimtaminte' => [
            //     'count' => CustomerRegister::where('customer_id', $customer_id)->where('register_id', 3)->count(),
            //     'count_public' => CustomerRegister::where('customer_id', $customer_id)->where('status', 'public')->where('register_id', 3)->count(),
            // ],
            
            // 'cereridsar' => [
            //     'count' => CustomerRegister::where('customer_id', $customer_id)->where('register_id', 4)->count(),
            //     'count_public' => CustomerRegister::where('customer_id', $customer_id)->where('status', 'public')->where('register_id', 4)->count(),
            // ],


            // 'chestionare' => [
            //     'count' => CustomerChestionar::where('customer_id', $customer_id)->count(),
            // ],

            // 'centralizatoare' => [
            //     'count' => CustomerCentralizator::where('customer_id', $customer_id)->count(),
            // ],

            // 'files' => [
            //     'count' => CustomerFile::where('customer_id', $customer_id)->count(),
            // ],

            // 'educatie' => [
            //     'count' => CustomerCurs::where('customer_id', $customer_id)->count(),
            // ], 
        ];
    }

}
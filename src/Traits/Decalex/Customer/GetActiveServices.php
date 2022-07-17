<?php

namespace B2B\Traits\Decalex\Customer;

use B2B\Classes\Comptech\Performers\Datatable\DoAction;
use B2B\Models\Decalex\CustomerContract;
use B2B\Models\Decalex\CustomerOrder;
use B2B\Models\Decalex\CustomerOrderService;

trait GetActiveServices {

    
    public static function getActiveServices($customer_id) {

        $today = \Carbon\Carbon::today()->format('Y-m-d');

        $activeContracts = CustomerContract::where('customer_id', $customer_id)
            ->whereDate('date_to', '>=', $today);

        if($activeContracts->get()->count() == 0)
        {
            return [];
        }

        $whereRaw = "( (`date_to` IS NULL) OR (`date_to`>='" . $today . "') ) AND (`contract_id` IN (" . $activeContracts->pluck('id')->implode(',') . "))";

        $activeOrders = CustomerOrder::where('customer_id', $customer_id)->whereRaw($whereRaw);

        if($activeOrders->get()->count() == 0)
        {
            return [];
        }
        $whereRaw = "(`order_id` IN (" . $activeOrders->pluck('id')->implode(',') . "))";

        $services = CustomerOrderService::whereRaw($whereRaw)->with(['service', 'order.contract'])->get()->toArray();

        return $services;
    }
}
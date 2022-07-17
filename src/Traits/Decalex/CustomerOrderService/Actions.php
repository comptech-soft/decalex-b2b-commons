<?php

namespace B2B\Traits\Decalex\CustomerOrderService;

use B2B\Classes\Comptech\Performers\Datatable\DoAction;
use B2B\Rules\Decalex\CustomerOrderService\Unique;

trait Actions {

    /** Get Rules */
    public static function GetRules($action, $input) {

        if($action == 'delete')
        {
            return NULL;
        }

        $result = [
            'customer_id' => 'required|exists:customers,id',
            'contract_id' => 'required|exists:customers-contracts,id',
            'order_id' => 'required|exists:customers-orders,id',
            'tarif' => 'required|numeric',
            'service_id' => [
                'required',
                'exists:services,id',
                new Unique($input),
            ],
        ];
        return $result;
    }

    public static function doAction($action, $input) {
        return (new DoAction($action, $input, __CLASS__))->Perform();
    }

}
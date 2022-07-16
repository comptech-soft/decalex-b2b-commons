<?php

namespace Decalex\Traits\CustomerOrderService;

use Comptech\Performers\Datatable\DoAction;

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
                new \Decalex\Rules\CustomerOrderService\Unique($input),
            ],
        ];
        return $result;
    }

    public static function doAction($action, $input) {
        return (new DoAction($action, $input, __CLASS__))->Perform();
    }

}
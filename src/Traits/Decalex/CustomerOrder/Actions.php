<?php

namespace B2B\Traits\Decalex\CustomerOrder;

use B2B\Classes\Comptech\Performers\Datatable\DoAction;

trait Actions {

    /** Get Rules */
    public static function GetRules($action, $input) {
        /**
         * Acelasi numar de contract poate fi la mai multi customers (clienti)
         * Un client nu poate sa aiba de doua ori acelasi numar de contract
         */
        if($action == 'delete')
        {
            return NULL;
        }
        $result = [
            'customer_id' => 'required|exists:customers,id',
            'contract_id' => 'required|exists:customers-contracts,id',
            'number' => [
                'required',
                'max:16',
                new \Decalex\Rules\CustomerOrder\OrderNumber($input),
            ],

            'date' => 'required|date',
            'date_to' => 'required|date',
        ];
        return $result;
    }

    public static function doInsert($input, $order) {
        $collectionInput = collect($input);

        $order = self::create($collectionInput->except(['services'])->toArray());


        $order->date_to_history = [[
            'date_to' =>  $input['date_to'],
            'updated_by' => \Sentinel::check()->id,
            'updated_at' => \Carbon\Carbon::now()->format('Y-m-d'),
        ]];

        $order->save();

        $order->attachServices($collectionInput->only(['services'])->toArray()['services']);

        return $order;
    }

    public static function doDuplicate($input, $order) {
    
        return self::doInsert($input, NULL);
    }

    public static function doUpdate($input, $order) {

        $collectionInput = collect($input);

        
        if($input['date_to'] != $order->date_to)
        {
            $order->date_to_history = $order->date_to_history ? $order->date_to_history : [];
            $order->date_to_history = [
                ...$order->date_to_history,
                [
                    'date_to' =>  $input['date_to'],
                    'updated_by' => \Sentinel::check()->id,
                    'updated_at' => \Carbon\Carbon::now()->format('Y-m-d'),
                ]
            ];
            $order->save();
        }

        $order->update($collectionInput->except(['services'])->toArray());

        $order->attachServices($collectionInput->only(['services'])->toArray()['services']);

        return $order;
    }

    public static function doAction($action, $input) {
        return (new DoAction($action, $input, __CLASS__))->Perform();
    }

    public function attachService($input) {
        $collectionInput = collect($input);

        \B2B\Models\Decalex\CustomerOrderService::create([
            ...$collectionInput->except(['id'])->toArray(),
            'service_id' => $input['id'],
            'order_id' => $this->id,
            'created_by' => \Sentinel::check()->id
        ]);
    }

    public function attachServices($input) {

        \B2B\Models\Decalex\CustomerOrderService::where('order_id', $this->id)->delete();

        foreach($input as $i => $service)
        {
            $this->attachService($service);
        }
    }

}
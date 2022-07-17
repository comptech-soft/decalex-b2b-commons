<?php

namespace B2B\Traits\Decalex\CustomerContract;

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
            'number' => [
                'required',
                'max:16',
                // 'unique:customers-contracts,number'
                new \B2B\Rules\Decalex\CustomerContract\ContractNumber($input),
            ],
            'status' => 'required',
            'date_from' => 'required|date',
            'date_to' => 'required|date',
        ];

        if(array_key_exists('hasOrder', $input) && ($input['hasOrder'] == 1) )
        {
            $result['order.number'] = [
                'required',
                'max:16',
                /**
                 * am un contract nou => comanda este noua => nu trebuie validate numeraul comenzii
                 */
            ];

            $result['order.date'] = 'required|date';
            $result['order.date_to'] = 'required|date';
            $result['order.services'] = 'required|array|min:1';
            $result['order.services.*.tarif'] = 'required|numeric|min:0.01';
        }

        // if($action == 'update')
        // {
        //     $result['number'][2] .= (',' . $input['number']);
        // }

        // dd($result);

        return $result;
    }

    public static function doInsert($input, $contract) {
        $customer = \B2B\Models\Decalex\Customer::find($input['customer_id']);

        $contract = $customer->attachContract($input);

        return $contract;
    }

    public static function doUpdate($input, $contract) {

        $collectionInput = collect($input);

        
        if($input['date_to'] != $contract->date_to)
        {
            $contract->date_to_history = $contract->date_to_history ? $contract->date_to_history : [];
            $contract->date_to_history = [
                ...$contract->date_to_history,
                [
                    'date_to' =>  $input['date_to'],
                    'updated_by' => \Sentinel::check()->id,
                    'updated_at' => \Carbon\Carbon::now()->format('Y-m-d'),
                ]
            ];
            $contract->save();
        }

        $contract->update($collectionInput->toArray());

        return $contract;
    }

    public static function doDuplicate($input, $contract) {
        return self::doInsert($input, $contract);
    }

    public static function doAction($action, $input) {
        return (new DoAction($action, $input, __CLASS__))->Perform();
    }

}
<?php

namespace B2B\Traits\Decalex\CustomerRegisterRow;

use Comptech\Performers\Datatable\DoAction;

trait Actions {

    public static function getNextOrderNo($customer_register_id) {
        $records = \DB::select("SELECT MAX(CAST(`order_no` AS UNSIGNED)) as max_order_no FROM `customers-registers-rows` WHERE (customer_register_id=" . $customer_register_id . ') AND ( (deleted = 0) OR (deleted IS NULL))');
        return number_format(1 + $records[0]->max_order_no, 0, '', '');
    }

    /** Get Rules */
    public static function GetRules($action, $input) {
        if($action == 'delete')
        {
            return NULL;
        }
        $result = [
            
        ];
        return $result;
    }

    public function attachValues($values) {

        foreach($values as $i => $item) {
            $input = [
                'row_id' => $this->id,
                'column_id' => $item['column_id'],
                'deleted' => 0,
                'value' => $item['value'],
                'created_by' => \Sentinel::check()->id,
                'updated_by' => \Sentinel::check()->id,
            ];

            $exists = \Decalex\Models\CustomerRegisterRowValue::where('row_id', $this->id)
                ->where('column_id', $item['column_id'])
                ->first();

            if($exists)
            {
                $exists->update($input);
            }
            else
            {
                \Decalex\Models\CustomerRegisterRowValue::create($input);
            }
        }
    }

    public static function doInsert($input, $row) {
        
        $inputCollection = collect($input)->only(['customer_register_id', 'customer_id', 'register_id', 'order_no', 'deleted', 'created_by', 'status', 'departament_id'])->toArray();

        $row = self::create([
            ...$inputCollection,
            'order_no' => self::getNextOrderNo($input['customer_register_id'])
        ]);

        $values = collect($input)->filter(function($value, $key){
            return substr($key, 0, 5) == 'value';
        })->map(function($item, $key){
            return [
                'column_id' => substr($key, 5),
                'value' => $item,
            ];
        })->toArray();
        
        $row->attachValues($values);
    }

    public static function doUpdate($input, $row) {
        $inputCollection = collect($input)->only(['customer_register_id', 'customer_id', 'register_id', 'order_no', 'deleted', 'created_by', 'departament_id'])->toArray();

        $row->update([
            ...$inputCollection,
            'status' => 'editat-decalex',
        ]);

        $values = collect($input)->filter(function($value, $key){
            return substr($key, 0, 5) == 'value';
        })->map(function($item, $key){
            return [
                'column_id' => substr($key, 5),
                'value' => $item,
            ];
        })->toArray();

        $row->attachValues($values);
    }

    public static function doDelete($input, $row) {
        \Decalex\Models\CustomerRegisterRowValue::where('row_id', $row->id)->delete();
        $row->delete();
        return $row;
    }

    public static function doAction($action, $input) {
        return (new DoAction($action, $input, __CLASS__))->Perform();
    }

    public static function changeStatus($input) {
        return (new \Decalex\Performers\CustomerRegisterRow\ChangeStatus($input))
            ->SetSuccessMessage('Schimbare status cu success.')
            ->Perform();
    }

}
<?php

namespace B2B\Traits\Decalex\RegisterRow;

use B2B\Classes\Comptech\Performers\Datatable\DoAction;

trait Actions {

    /** Get Rules */
    public static function GetRules($action, $input) {
        if($action == 'delete')
        {
            return NULL;
        }
        $result = [
            'customer_id' => 'required|exists:customers,id',
            'register_id' => 'required|exists:registers,id',
        ];
        return $result;
    }

    public function updateValues($input) {

        foreach($input as $i => $column)
        {
            $rowValue = \Decalex\Models\RegisterRowValue::where('row_id', $this->id)->where('column_id', $column['id'])->first();

            if(! $rowValue )
            {
                $rowValue = \Decalex\Models\RegisterRowValue::create([
                    'register_id' => $this->register_id,
                    'customer_id' => $this->customer_id,
                    'row_id'=> $this->id,
                    'column_id' => $column['id'],
                ]);
            }

            $rowValue->update([
                'value' => $column['value'],
            ]);
        }
    }

    public function attachValues($input) {
        foreach($input as $i => $column)
        {
            \Decalex\Models\RegisterRowValue::create([
                'customer_id' => $this->customer_id,
                'register_id' => $this->register_id,
                'column_id' => $column['id'],
                'value' => $column['value'],
                'row_id' => $this->id,
                'status' => NULL,
                'created_by' => \Sentinel::check()->id,
                'updated_by' => \Sentinel::check()->id,
            ]);
        }
    }

    
    public static function doInsert($input, $row) {
        $collectionInput = collect($input);
        $row = self::create($collectionInput->except(['columns'])->toArray());
        if(array_key_exists('columns', $input))
        {
            $row->attachValues($collectionInput->only(['columns'])->toArray()['columns']);
        }
        return $row;
    }


    public static function doDuplicate($input, $row) {
        return self::doInsert($input, $row);
    }


    public static function doDelete($input, $row) {
        \Decalex\Models\RegisterRowValue::where('row_id', $input['id'])->delete();
        $row->delete();
        return $row;
    }

    public static function doAction($action, $input) {       
        return (new DoAction($action, $input, __CLASS__))->Perform();
    }

}
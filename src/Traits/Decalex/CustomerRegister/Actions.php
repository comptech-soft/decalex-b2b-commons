<?php

namespace B2B\Traits\Decalex\CustomerRegister;

use B2B\Classes\Comptech\Performers\Datatable\DoAction;
use B2B\Models\Decalex\CustomerRegisterRowValue;
use B2B\Models\Decalex\CustomerRegisterRow;

trait Actions {

    public static function GetRules($action, $input) {
        if($action == 'delete')
        {
            return NULL;
        }
        $result = [
            'customer_id' => 'required|exists:customers,id',
            'register_id' => 'required|exists:registers,id',
            'number' => 'required',
            'date' => 'required|date',
            'responsabil_nume' => 'required',
            'responsabil_functie' => 'required',
        ];
        return $result;
    }

    public static function doDelete($input, $register) {

        if($register->rows)
        {
            $row_ids = $register->rows->map(function($item){
                return $item->id;
            })->implode(',');

            if( strlen($row_ids) > 0)
            {
                $whereRaw = "(`customers-registers-rows-values`.`row_id` IN (" . $row_ids .  "))";
                CustomerRegisterRowValue::whereRaw($whereRaw)->delete();
            }

            CustomerRegisterRow::where('customer_register_id', $register->id)->delete();
        }
        
        $register->delete();
        
        return $register;
    }


    public static function doAction($action, $input) {
        return (new DoAction($action, $input, __CLASS__))->Perform();
    }

}
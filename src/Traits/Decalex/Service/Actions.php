<?php

namespace B2B\Traits\Decalex\Service;

use Comptech\Performers\Datatable\DoAction;

trait Actions {

    /** Get Rules */
    public static function GetRules($action, $input) {
        if($action == 'delete')
        {
            return NULL;
        }
        $result = [
            'name' => 'required|max:191|unique:services,name',
            'tarif' => 'nullable|numeric',
            'tarif_ore_suplimentare' => 'nullable|numeric',
        ];
        if( $action == 'update')
        {
            $result['name'] .= (',' . $input['id']);
        }
        return $result;
    }

    public static function getNextOrder() {
        $records = \DB::select("SELECT MAX(CAST(`order_no` AS UNSIGNED)) as max_order_no FROM services");
        return number_format(1 + $records[0]->max_order_no, 0, '', '');
    }

    public static function doAction($action, $input) {
        if($action == 'insert')
        {
            $input['order_no'] = self::getNextOrder();
        }
        return (new DoAction($action, $input, __CLASS__))->Perform();
    }

}
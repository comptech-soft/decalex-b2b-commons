<?php

namespace Decalex\Traits\CentralizatorColumn;

use Comptech\Performers\Datatable\DoAction;

trait Actions {

    public static function GetRules($action, $input) {
        if($action == 'delete')
        {
            return NULL;
        }
        $result = [
            'slug' => 'required',
            'caption' => 'required',
            'type' => 'required',
        ];
        return $result;
    }

    public static function GetValidationInput($action, $input) {
        return [
            ...$input,
            'slug' => \Str::slug($input['caption'])
        ];
    }

    public static function PrepareActionInput($action, $input) {
        return [
            ...$input,
            'slug' => \Str::slug($input['caption']),
            'order_no' => ! $input['order_no'] ? self::getNextOrderNo($input['centralizator_id']) : $input['order_no'],
        ];
    }

    public static function getNextOrderNo($centralizator_id) {
        $records = \DB::select("SELECT MAX(CAST(`order_no` AS UNSIGNED)) as max_order_no FROM `centralizatoare_coloane` WHERE (centralizator_id=" . $centralizator_id . ') AND (deleted = 0)');
        return number_format(1 + $records[0]->max_order_no, 0, '', '');
    }

    public static function doDelete($input, $column) {
        
        $column->deleted = 1;
        $column->updated_by = \Sentinel::check()->id;
        $column->save();
        return $column;
    }

    public static function doAction($action, $input) {
        return (new DoAction($action, $input, __CLASS__))->Perform();
    }

}
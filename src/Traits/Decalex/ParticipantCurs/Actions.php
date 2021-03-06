<?php

namespace B2B\Traits\Decalex\ParticipantCurs;

use B2B\Classes\Comptech\Performers\Datatable\DoAction;
use B2B\Models\Decalex\CustomerCurs;

trait Actions {

    public static function GetMessages($action, $input) {

        return [
        ];
    }

    public static function GetRules($action, $input) {
        if($action == 'delete')
        {
            return NULL;
        }
        $result = [
            'nume' => 'required',
        ];

        return $result;
    }

    public static function doInsert($input, $participant) {

        $customerCurs = CustomerCurs::where('customer_id', $input['customer_id'])
            ->where('curs_id', $input['curs_id'])
            ->where('trimitere_id', $input['trimitere_id'])
            ->first();

        return self::create([
            ...$input,
            'customer_curs_id' => $customerCurs->id,
        ]);
    }

    public static function doAction($action, $input) {
        return (new DoAction($action, $input, __CLASS__))->Perform();
    }

}
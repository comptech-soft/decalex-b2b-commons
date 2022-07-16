<?php

namespace Decalex\Traits\ChestionarIntrebare;

use Comptech\Performers\Datatable\DoAction;

trait Actions {

    /** Get Rules */
    public static function GetRules($action, $input) {

        if($action == 'delete')
        {
            return NULL;
        }
        $result = [
            'chestionar_id' => 'required|exists:chestionare,id',
            'intrebare_id' => 'required|exists:intrebari,id',
        ];

        return $result;
    }

    public static function doUpdate($input, $intrebare) {

        $inputIntrebare = collect($input)->only(['intrebare'])->toArray()['intrebare'];

        $inputIntrebare = collect($inputIntrebare)->only(['question', 'tip_intrebare'])->toArray();

        $intrebare->intrebare->update($inputIntrebare);

        return $intrebare;
    }

    // public static function doDuplicate($input, $contract) {
    //     return self::doInsert($input, $contract);
    // }

    public static function doAction($action, $input) {
        return (new DoAction($action, $input, __CLASS__))->Perform();
    }

}
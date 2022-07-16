<?php

namespace Decalex\Traits\TipIntrebare;

use Comptech\Performers\Datatable\DoAction;

trait Actions {

    /** Get Rules */
    public static function GetRules($action, $input) {

        if($action == 'delete')
        {
            return NULL;
        }
        $result = [
            'name' => 'required',
            'slug' => 'required',
            'icon' => 'required',
        ];
        return $result;
    }

    public static function doAction($action, $input) {
        return (new DoAction($action, $input, __CLASS__))->Perform();
    }

}
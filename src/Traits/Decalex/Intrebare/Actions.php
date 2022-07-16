<?php

namespace Decalex\Traits\Intrebare;

use Comptech\Performers\Datatable\DoAction;

trait Actions {

    /** Get Rules */
    public static function GetRules($action, $input) {
        if($action == 'delete')
        {
            return NULL;
        }
        $result = [
            'question' => 'required',
            'tip_intrebare' => 'required|exists:tipuri-intrebari,id',
        ];
        return $result;
    }

    public static function doInsert($input, $intrebare) {
        if(! array_key_exists('parent_id', $input) )
        {
            $input['parent_id'] = NULL;
        } 
        
        $intrebare = self::createQuestion($input, $input['parent_id'] );

        return $intrebare;
    }

    public static function doUpdate($input, $intrebare) {

        $intrebare->updateQuestion($input);

        return $intrebare;
    }

    public static function doDuplicate($input, $intrebare) {
        return self::doInsert($input, NULL);
    }

    public static function doDelete($input, $intrebare) {
        $intrebare->deleted = 1;
        $intrebare->save();
        return $intrebare;
    }

    public static function doAction($action, $input) {
        return (new DoAction($action, $input, __CLASS__))->Perform();
    }

}
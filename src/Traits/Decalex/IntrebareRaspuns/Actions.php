<?php

namespace Decalex\Traits\IntrebareRaspuns;

use Comptech\Performers\Datatable\DoAction;

trait Actions {

    // /** Get Rules */
    // public static function GetRules($action, $input) {
    //     /**
    //      * Acelasi numar de contract poate fi la mai multi customers (clienti)
    //      * Un client nu poate sa aiba de doua ori acelasi numar de contract
    //      */
    //     if($action == 'delete')
    //     {
    //         return NULL;
    //     }
    //     $result = [
    //         'question' => 'required',
    //         'tip_intrebare' => 'required|exists:tipuri-intrebari,id',
    //     ];
    //     return $result;
    // }

    // public static function doInsert($input, $intrebare) {
        
    //     $intrebare = self::createQuestion($input);

    //     return $intrebare;
    // }

    // public static function doAction($action, $input) {
    //     return (new DoAction($action, $input, __CLASS__))->Perform();
    // }

}
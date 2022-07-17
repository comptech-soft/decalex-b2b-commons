<?php

namespace B2B\Traits\Decalex\Registru;

use B2B\Classes\Comptech\Performers\Datatable\DoAction;

trait Actions {

    public static function addColumn($input) {
        return (new \B2B\Performers\Decalex\Registru\AddColumn($input))
            ->SetSuccessMessage('Actualizare efectuată cu succes!')
            ->Perform();
    }


    public static function addGroup($input) {
        return (new \B2B\Performers\Decalex\Registru\AddGroup($input))
            ->SetSuccessMessage('Actualizare efectuată cu succes!')
            ->Perform();
    }

    public static function doDelete($input, $registru) {
        $registru->deleted = 1;
        $registru->save();
        return $registru;
    }

    public static function doAction($action, $input) {
        return (new DoAction($action, $input, __CLASS__))->Perform();
    }

    public static function xlsImport($input) {
        return (new \B2B\Performers\Decalex\Registru\XlsImport($input))
            ->SetSuccessMessage('Import realizat cu success!')
            ->Perform();
    }

    public static function copyToCustomer($input) {
        return (new \B2B\Performers\Decalex\Registru\CopyToCustomer($input))
            ->SetSuccessMessage('Copiere realizată cu success!')
            ->Perform();
    }


}
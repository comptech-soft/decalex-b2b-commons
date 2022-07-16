<?php

namespace Decalex\Traits\Registru;

use Comptech\Performers\Datatable\DoAction;

trait Actions {

    public static function addColumn($input) {
        return (new \Decalex\Performers\Registru\AddColumn($input))
            ->SetSuccessMessage('Actualizare efectuată cu succes!')
            ->Perform();
    }


    public static function addGroup($input) {
        return (new \Decalex\Performers\Registru\AddGroup($input))
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
        return (new \Decalex\Performers\Registru\XlsImport($input))
            ->SetSuccessMessage('Import realizat cu success!')
            ->Perform();
    }

    public static function copyToCustomer($input) {
        return (new \Decalex\Performers\Registru\CopyToCustomer($input))
            ->SetSuccessMessage('Copiere realizată cu success!')
            ->Perform();
    }


}
<?php

namespace Decalex\Traits\CustomerFile;

use Comptech\Performers\Datatable\GetItems;

trait GetFiles {

    /**  Get items */
    public static function getItems($input) {
        return (new GetItems(
            $input, 
            self::query(), 
            __CLASS__
        ))->Perform();
    }

    public static function getRegisterRowFiles($input) {
        return (new \Decalex\Performers\CustomerFile\GetRegisterRowFiles($input))
            ->SetSuccessMessage('Operație cu success!')
            ->Perform();

    }  

}


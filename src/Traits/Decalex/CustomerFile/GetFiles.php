<?php

namespace B2B\Traits\Decalex\CustomerFile;

use B2B\Classes\Comptech\Performers\Datatable\GetItems;
use B2B\Performers\Decalex\CustomerFile\GetRegisterRowFiles;

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
        return (new GetRegisterRowFiles($input))
            ->SetSuccessMessage('Operație cu success!')
            ->Perform();

    }  

}


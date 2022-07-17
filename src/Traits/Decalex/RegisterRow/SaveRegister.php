<?php

namespace B2B\Traits\Decalex\RegisterRow;

use B2B\Performers\Decalex\RegisterRow\SaveRegister as SalvareRegistru;

trait SaveRegister {

    public static function SaveRegister($input) {

        return (new SalvareRegistru($input))
            ->SetSuccessMessage('Save register successfully!')
            ->Perform();

    }

}
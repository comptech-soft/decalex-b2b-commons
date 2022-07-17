<?php

namespace B2B\Traits\Decalex\RegisterRow;

trait SaveRegister {

    public static function SaveRegister($input) {

        return (new \B2B\Performers\Decalex\RegisterRow\SaveRegister($input))
            ->SetSuccessMessage('Save register successfully!')
            ->Perform();

    }

}
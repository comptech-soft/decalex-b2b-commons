<?php

namespace Decalex\Traits\RegisterRow;

trait SaveRegister {

    public static function SaveRegister($input) {

        return (new \Decalex\Performers\RegisterRow\SaveRegister($input))
            ->SetSuccessMessage('Save register successfully!')
            ->Perform();

    }

}
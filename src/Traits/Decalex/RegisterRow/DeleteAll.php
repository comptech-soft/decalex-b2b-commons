<?php

namespace Decalex\Traits\RegisterRow;

trait DeleteAll {

    public static function DeleteAll($input) {

        return (new \Decalex\Performers\RegisterRow\DeleteAll($input))
            ->SetSuccessMessage('Delete register successfully!')
            ->Perform();

    }

}
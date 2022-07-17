<?php

namespace B2B\Traits\Decalex\RegisterRow;

trait DeleteAll {

    public static function DeleteAll($input) {

        return (new \B2B\Performers\Decalex\RegisterRow\DeleteAll($input))
            ->SetSuccessMessage('Delete register successfully!')
            ->Perform();

    }

}
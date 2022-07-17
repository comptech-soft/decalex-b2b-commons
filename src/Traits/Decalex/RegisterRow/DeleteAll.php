<?php

namespace B2B\Traits\Decalex\RegisterRow;

use B2B\Performers\Decalex\RegisterRow\DeleteAll as DeleteAllRows;

trait DeleteAll {

    public static function DeleteAll($input) {

        return (new DeleteAllRows($input))
            ->SetSuccessMessage('Delete register successfully!')
            ->Perform();

    }

}
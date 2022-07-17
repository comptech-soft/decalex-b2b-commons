<?php

namespace B2B\Traits\Decalex\Centralizator;

use B2B\Performers\Decalex\Centralizator\ReorderColumns;

trait Reorder {

    public static function reorderColumns($input) {

        return (new ReorderColumns($input))
            ->SetSuccessMessage('Reorder completed successfully!')
            ->Perform();
    }

}
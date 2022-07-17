<?php

namespace B2B\Traits\Decalex\Centralizator;

trait Reorder {

    public static function reorderColumns($input) {

        return (new \B2B\Performers\Decalex\Centralizator\ReorderColumns($input))
            ->SetSuccessMessage('Reorder completed successfully!')
            ->Perform();
    }

}
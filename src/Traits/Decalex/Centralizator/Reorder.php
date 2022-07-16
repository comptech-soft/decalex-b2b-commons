<?php

namespace Decalex\Traits\Centralizator;

trait Reorder {

    public static function reorderColumns($input) {

        return (new \Decalex\Performers\Centralizator\ReorderColumns($input))
            ->SetSuccessMessage('Reorder completed successfully!')
            ->Perform();
    }

}
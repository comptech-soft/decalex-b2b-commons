<?php

namespace B2B\Traits\Decalex\RegisterColumn;

use B2B\Performers\Decalex\RegisterColumn\Reorder as ReorderColumns;

trait Reorder {

    public static function reorder($input) {
        return (new ReorderColumns($input))
            ->SetSuccessMessage('Reorder completed successfully!')
            ->Perform();
    }

}
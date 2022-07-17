<?php

namespace B2B\Traits\Decalex\Service;

use B2B\Performers\Decalex\Service\Reorder as ReorderServices;

trait Reorder {

    public static function reorderServices($input) {
        return (new ReorderServices($input))
            ->SetSuccessMessage('Reorder completed successfully!')
            ->Perform();
    }

}
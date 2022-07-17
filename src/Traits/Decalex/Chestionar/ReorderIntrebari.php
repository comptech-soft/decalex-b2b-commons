<?php

namespace B2B\Traits\Decalex\Chestionar;

use B2B\Performers\Decalex\Chestionar\ReorderIntrebari as Reorder;

trait ReorderIntrebari {

    public static function reorderIntrebari($input) {
        return (new Reorder($input))
            ->SetSuccessMessage('Reorder completed successfully!')
            ->Perform();
    }

}
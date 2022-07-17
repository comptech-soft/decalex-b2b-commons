<?php

namespace B2B\Traits\Decalex\Chestionar;

trait ReorderIntrebari {

    public static function reorderIntrebari($input) {
        return (new \Decalex\Performers\Chestionar\ReorderIntrebari($input))
            ->SetSuccessMessage('Reorder completed successfully!')
            ->Perform();
    }

}
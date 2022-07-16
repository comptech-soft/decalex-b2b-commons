<?php

namespace Decalex\Traits\Chestionar;

trait ReorderRaspunsuri {

    public static function reorderRaspunsuri($input) {
        return (new \Decalex\Performers\Chestionar\ReorderRaspunsuri($input))
            ->SetSuccessMessage('Reorder completed successfully!')
            ->Perform();
    }

}
<?php

namespace B2B\Traits\Decalex\Chestionar;

use B2B\Performers\Decalex\Chestionar\ReorderRaspunsuri as Reorder;

trait ReorderRaspunsuri {

    public static function reorderRaspunsuri($input) {
        return (new Reorder($input))
            ->SetSuccessMessage('Reorder completed successfully!')
            ->Perform();
    }

}
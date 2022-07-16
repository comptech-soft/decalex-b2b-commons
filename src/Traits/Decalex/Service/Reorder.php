<?php

namespace Decalex\Traits\Service;

trait Reorder {

    public static function reorderServices($input) {
        return (new \Decalex\Performers\Service\Reorder($input))
            ->SetSuccessMessage('Reorder completed successfully!')
            ->Perform();
    }

}
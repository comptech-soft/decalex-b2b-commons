<?php

namespace B2B\Traits\Decalex\Service;

trait Reorder {

    public static function reorderServices($input) {
        return (new \Decalex\Performers\Service\Reorder($input))
            ->SetSuccessMessage('Reorder completed successfully!')
            ->Perform();
    }

}
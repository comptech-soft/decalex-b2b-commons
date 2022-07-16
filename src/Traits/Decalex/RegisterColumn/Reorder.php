<?php

namespace Decalex\Traits\RegisterColumn;

trait Reorder {

    public static function reorder($input) {
        return (new \Decalex\Performers\RegisterColumn\Reorder($input))
            ->SetSuccessMessage('Reorder completed successfully!')
            ->Perform();
    }

}
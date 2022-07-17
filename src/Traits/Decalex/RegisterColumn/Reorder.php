<?php

namespace B2B\Traits\Decalex\RegisterColumn;

trait Reorder {

    public static function reorder($input) {
        return (new \Decalex\Performers\RegisterColumn\Reorder($input))
            ->SetSuccessMessage('Reorder completed successfully!')
            ->Perform();
    }

}
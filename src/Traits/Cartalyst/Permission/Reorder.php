<?php

namespace B2B\Traits\Cartalyst\Permission;

trait Reorder {

    public static function reorderNodes($input) {
        return (new \Cartalyst\Performers\Permission\Reorder($input))
            ->SetSuccessMessage('Reorder completed successfully!')
            ->Perform();
    }

}
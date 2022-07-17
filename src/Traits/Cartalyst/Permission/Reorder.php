<?php

namespace B2B\Traits\Cartalyst\Permission;

use B2B\Performers\Cartalyst\Permission\Reorder as ReorderPermissions;

trait Reorder {

    public static function reorderNodes($input) {
        return (new ReorderPermissions($input))
            ->SetSuccessMessage('Reorder completed successfully!')
            ->Perform();
    }

}
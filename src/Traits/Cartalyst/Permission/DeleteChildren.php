<?php

namespace B2B\Traits\Cartalyst\Permission;

use B2B\Performers\Cartalyst\Permission\DeleteChildren as DeletePermissionChildren;

trait DeleteChildren {

    public static function deleteChildren($input) {
        return (new DeletePermissionChildren($input))
            ->SetSuccessMessage('Delete children completed successfully!')
            ->Perform();
    }

}
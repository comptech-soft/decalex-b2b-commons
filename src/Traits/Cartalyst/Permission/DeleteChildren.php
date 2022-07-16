<?php

namespace Cartalyst\Traits\Permission;

trait DeleteChildren {

    public static function deleteChildren($input) {
        return (new \Cartalyst\Performers\Permission\DeleteChildren($input))
            ->SetSuccessMessage('Delete children completed successfully!')
            ->Perform();
    }

}
<?php

namespace B2B\Traits\Cartalyst\Permission;

trait DeleteChildren {

    public static function deleteChildren($input) {
        return (new \Cartalyst\Performers\Permission\DeleteChildren($input))
            ->SetSuccessMessage('Delete children completed successfully!')
            ->Perform();
    }

}
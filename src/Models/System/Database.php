<?php

namespace B2B\Models\System;

class Database {

    public static function updateField($input) {

        return (new \System\Performers\Database\UpdateField($input))
            ->SetSuccessMessage('Update field completed successfully!')
            ->Perform();
    }

}
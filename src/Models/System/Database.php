<?php

namespace B2B\Models\System;

use B2B\Performers\System\Database\UpdateField;

class Database {

    public static function updateField($input) {

        return (new UpdateField($input))
            ->SetSuccessMessage('Modificarea a fost efectuată cu succes.')
            ->Perform();
    }

}
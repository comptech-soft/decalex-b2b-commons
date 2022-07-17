<?php

namespace B2B\Traits\Decalex\Planning;

use B2B\Performers\Decalex\Planning\UpdateTaskStatus as UpdateStatus;

trait UpdateTaskStatus {

    public static function updateTaskStatus($input) {
        return (new UpdateStatus($input))
            ->SetSuccessMessage('Salvare cu success!')
            ->Perform();
    }

}